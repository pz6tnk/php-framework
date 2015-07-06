<?php

namespace pz6\app;

class DB
{
    private $dbh;
    private $className = 'stdClass';

    public function __construct()
    {
        $config = new Config();
        $config->load();
        $this->dbh = new \PDO($config->driver . ':dbname=' . $config->dbname . ';host=' . $config->host, $config->user, $config->password);
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