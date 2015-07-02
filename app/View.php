<?php

namespace pz6\app;

class View {

    protected $data = [];

    public function __construct()
    {

    }
    public function __get($var)
    {
        return $this->data[$var];
    }

    public function  __set($var, $value)
    {
        $this->data[$var] = $value;
    }
    public function display($name) {
        $twig = new Twig($name);
        $twig->render($name, $this->data);
    }
}