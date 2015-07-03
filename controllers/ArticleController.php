<?php

namespace pz6\controllers;

use pz6\app\Controller;
use pz6\app\MigrationManager;
use pz6\models\Articles;
use pz6\app\E404Exception;
use pz6\app\View;

class ArticleController extends Controller
{
    public function ActionAll()
    {
        $articles = Articles::getAll();
        $view = new View;
        $view->articles = $articles;
        $view->display('articles/all');
    }
    public function ActionOne()
    {
        if(isset($_GET['id'])) {
            $articles = Articles::getOne($_GET['id']);
            $message = 'Статья с id ' . $_GET['id'] . ' не существует';
        } else {
            $message = 'Id не задан';
        }
        if(empty($articles)) {
            throw new E404Exception($message);
        }
        $view = new View;
        $view->article = $articles;
        $view->display('articles/one');
    }
}