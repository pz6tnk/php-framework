<?php

namespace pz6\app;

use pz6\controllers\ArticleController;
use pz6\app\E404Exception;
use pz6\app\View;
use pz6\app\TSingleton;
use pz6\app\Request;

class Application
{
    use TSingleton;

    public function run()
    {
        $request = Request::getInstance()->parseUrl();
        try
        {
            $controller = new $request['ctrl']();
            $method = 'action' . $request['act'];
            $controller->$method();
        }
        catch(E404Exception $e) {
            $view = new View;
            $view->error = $e->getMessage();
            $view->display('errors/404');
        }
    }
}