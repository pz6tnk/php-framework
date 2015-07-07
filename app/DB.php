<?php

namespace pz6\app;

class DB
{
    private $dbh;
    private $className = 'stdClass';

    public function __construct()
    {
        $config = new Config();
        $db_conf = $config->load('db');
        $this->dbh = new \PDO($db_conf['driver'] . ':dbname=' . $db_conf['dbname'] . ';host=' . $db_conf['host'], $db_conf['user'], $db_conf['password']);
    }
    public function setClassName($className)
    {
        $this->className = $className;
    }
    public function query($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $this->className);
    }
    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

}