<?php

namespace pz6\app;

class Twig
{
    protected $twig;

    public function __construct($name = [])
    {
        $path = __DIR__ . '/../views/';
        $loader = new \Twig_Loader_Filesystem($path);
        $this->twig = new \Twig_Environment($loader, [
            'cache' => __DIR__ . '/../cache/Twig',
            'auto_reload' => true,
        ]);
    }

    public function render($name, $data = [])
    {
        $template = $this->twig->loadTemplate($name . '.twig');
        echo $template->render($data);
    }
}