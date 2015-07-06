<?php

namespace pz6\app;

class Config extends Std
{
    private $path = '/../config/db.php';

    public function load()
    {
        if (!is_readable(__DIR__ . $this->path)) {
            throw new Exception('Config file ' . $this->path . ' is not found or is not readable');
        }
        return $this->fromArray(include(__DIR__ . $this->path));
    }
}