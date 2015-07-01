<?php

namespace pz6\app;

use pz6\controllers\ArticleController;
use pz6\app\E404Exception;
use pz6\app\View;

class Application
{
    public function run()
    {
        $ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'Article';
        $act = isset($_GET['act']) ? $_GET['act'] : 'All';
        $controllerClassName = 'pz6\controllers\\' . $ctrl . 'Controller';

        try
        {
            $controller = new $controllerClassName();
            $method = 'action' . $act;
            $controller->$method();
        }
        catch(E404Exception $e) {
            $view = new View;
            $view->error = $e->getMessage();
            $view->display('errors/404.php');
        }
    }
}