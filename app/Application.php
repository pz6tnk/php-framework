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
            if (class_exists($request['ctrl'])) {
                $controller = new $request['ctrl']();
                $controller->callAction($request['act']);
            } else {
                throw new E404Exception('Controller ' . $request['ctrl'] . ' is not found');
            }
        }
        catch(E404Exception $e) {
            $view = new View;
            $view->error = $e->getMessage();
            $view->display('errors/404');
        }
    }
}