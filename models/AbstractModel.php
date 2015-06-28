<?php

class AbstractModel
{
    protected static $table;
    protected static $class;

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
}