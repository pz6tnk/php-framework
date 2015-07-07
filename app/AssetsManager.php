<?php

namespace pz6\app;

class AssetsManager
{
    use TSingleton;

    public $css;
    public $js;

    public function addConfigAssets()
    {
        $config = New Config();
        $assets_conf = $config->load('assets');
        foreach ($assets_conf as $item) {
            if($item['mode'] == 'on') {
                if(substr($item['cdn'], -3) == 'css') {
                    $this->css = $this->css . $this->addCssUrl($item['cdn']);
                } elseif(substr($item['cdn'], -2) == 'js') {
                    $this->js = $this->js . $this->addJsUrl($item['cdn']);
                }
            }
        }
        return $this->css . $this->js;
    }

    public function addCssUrl($link)
    {
        return "<link rel='stylesheet' href='$link'>";
    }
    public function addJsUrl($link)
    {
        return "<script src='$link'></script>";
    }
    public function addCssFile($name)
    {
        $name = 'http://' . $_SERVER['SERVER_NAME'] . '/public/css/' . $name . '.css';
        $this->css = $this->css . "<link rel='stylesheet' href='$name'>";
    }
    public function addJsFile($name)
    {
        $name = 'http://' . $_SERVER['SERVER_NAME'] . '/public/js/' . $name . '.js';
        $this->css = $this->css . "<script src='$name'>";
    }
}