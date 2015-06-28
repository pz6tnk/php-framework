<?php

class ArticleController
{
    public function ActionAll()
    {
        $articles = Articles::getAll();
        require_once (__DIR__ . '/../views/articles/all.php');

    }
    public function ActionOne()
    {
        $articles = Articles::getOne($_GET['id']);
        require_once (__DIR__ . '/../views/articles/one.php');
    }
}