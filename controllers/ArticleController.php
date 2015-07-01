<?php

namespace pz6\controllers;

use pz6\models\Articles;
use pz6\app\E404Exception;
use pz6\app\View;

class ArticleController
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
        $articles = Articles::getOne($_GET['id']);
        if(empty($articles)) {
            throw new E404Exception('Статья с id ' . $_GET['id'] . ' не существует');
        }
        $view = new View;
        $view->article = $articles;
        $view->display('articles/one');
    }
}