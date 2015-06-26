<?php

class ArticleController
{
    public function ActionAll()
    {
        $articles = Articles::getAll();
        require_once (__DIR__ . '/../views/articles/all.php');
    }
}