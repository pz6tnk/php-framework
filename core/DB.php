<?php

class DB
{
    private $dbh;
    private $className = 'stdClass';

    public function __construct()
    {
        $this->dbh = new PDO('mysql:dbname=laracast;host=localhost', 'root', 'lollipop');
    }
    public function setClassName($className)
    {
        $this->className = $className;
    }
    public function query($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }
}