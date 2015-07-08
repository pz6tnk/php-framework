<?php

namespace pz6\controllers;

use pz6\app\Controller;
use pz6\app\View;

class IndexController extends Controller
{
    public function actionIndex()
    {
        $view = new View;
        $view->display('index');
    }
}