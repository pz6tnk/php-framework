<?php

namespace pz6\app;


trait TSingleton
{

    private function __construct()
    {

    }

    private function __clone()
    {

    }

    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance)
            $instance = new static;
        return $instance;
    }

}