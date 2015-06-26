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
}