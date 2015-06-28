<?php

class ArticleController
{
    public function ActionAll()
    {
     /*   $articles = Articles::getAll();
        $view = new View;
        $view->articles = $articles;
        $view->display('articles/all.php');*/
        $article = new Articles();
        $article->title = 'Tit';
        $article->body = 'Body';
        $article->insert();
    }
    public function ActionOne()
    {
        $articles = Articles::getOne($_GET['id']);
        require_once (__DIR__ . '/../views/articles/one.php');
    }
}