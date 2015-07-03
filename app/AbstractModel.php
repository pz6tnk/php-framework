<?php

namespace pz6\app;

abstract class AbstractModel
{
    protected static $table;
    protected static $class;

    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }
    public function __get($k)
    {
        return $this->data[$k];
    }
    public function __isset($k)
    {
        return isset($this->data[$k]);
    }

    public static function getAll()
    {
        $sql = 'SELECT * FROM ' . static::$table;
        $DB = new DB;
        $DB->setClassName(get_called_class());
        return $DB->query($sql);
    }
    public static function getOne($id)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $DB = new DB;
        $DB->setClassName(get_called_class());
        $item = $DB->query($sql, [':id' => $id]);
        if(!empty($item)) {
            return $item[0];
        }
    }

    public function getByColumn($field, $value)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $field . '=:value';
        $DB = new DB;
        $DB->setClassName(get_called_class());
        return $DB->query($sql, [':value' => $value]);
    }

    protected function insert()
    {
        $cols = array_keys($this->data);
        $data = [];
        foreach ($this->data as $key=>$value) {
            $data[':' . $key] = $value;
        }
        $sql = 'INSERT INTO ' . static::$table . '
            (' . implode(', ', $cols) . ')
            VALUES
            (' . implode(', ', array_keys($data)) . ')';
        $DB = new DB;
        $DB->execute($sql, $data);
        return $DB->lastInsertId();
    }

    protected function update()
    {
        $cols = [];
        $data = [];
        foreach ($this->data as $key => $value) {
            $data[':' . $key] = $value;
            if($key == 'id') {
                continue;
            }
            $cols[] = $key . '=:' . $key;
        }
        $sql = '
            UPDATE ' . static::$table . '
            SET ' . implode(', ', $cols) . '
            WHERE id =:id
            ';
        $DB = new DB;
        return $DB->execute($sql, $data);
    }

    public function save()
    {
        if(isset($this->id)) {
            return $this->update();
        } else {
            return $this->insert();
        }
    }

    public function delete($field = 'id')
    {
        if(isset($this->value)) {
            $where =  ' WHERE ' . $field . '=' . '\'' . $this->value . '\'';
        }
        else {
            $where = '';
        }
        $sql = 'DELETE FROM ' . static::$table . $where . ' ORDER BY ' . $field . ' DESC LIMIT 1';
        $DB = new DB;
        return $DB->execute($sql);
    }
}