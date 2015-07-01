<?php

namespace pz6\app;

class View {

    protected $data = [];

    public function __get($var)
    {
        return $this->data[$var];
    }

    public function  __set($var, $value)
    {
        $this->data[$var] = $value;
    }
    public function display($name) {
        foreach($this->data as $key => $val) {
            $$key = $val;
        }
        require (__DIR__ . '/../views/' . $name);
    }
}