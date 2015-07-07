<?php

namespace pz6\app;

class Config
{
    private $path = '/../config/';

    public function load($file)
    {
        if (!is_readable(__DIR__ . $this->path)) {
            throw new Exception('Config file ' . $this->path . ' is not found or is not readable');
        }
        return include(__DIR__ . $this->path . $file . '.php');
    }
}