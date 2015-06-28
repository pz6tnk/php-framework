<?php

class AbstractModel
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
    function __isset($k)
    {
        return isset($this->data[$k]);
    }

    public static function getAll()
    {
        $sql = 'SELECT * FROM ' . static::$table;
        $DB = new DB;
        $DB->setClassName(static::$class);
        return $DB->query($sql);
    }
    public static function getOne($id)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $DB = new DB;
        $DB->setClassName(static::$class);
        return $DB->query($sql, [':id' => $id])[0];
    }

    public function getByColumn($field, $value)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $field . '=:value';
        $DB = new DB;
        $DB->setClassName(static::$class);
        return $DB->query($sql, [':value' => $value]);
    }

    public function insert()
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
        $this->id = $DB->lastInsertId();
    }
}