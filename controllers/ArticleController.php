<?php

class ArticleController
{
    public function ActionAll()
    {
        $articles = Articles::getAll();
        $view = new View;
        $view->articles = $articles;
        $view->display('articles/all.php');
      /*  $article = new Articles();
        $article->title = 'Tit';
        $article->body = 'Body';
        $article->id = 7;
        $article->delete();*/
    }
    public function ActionOne()
    {
        $articles = Articles::getOne($_GET['id']);
        if(empty($articles)) {
            throw new E404Exception();
        }

        require_once (__DIR__ . '/../views/articles/one.php');
    }
}