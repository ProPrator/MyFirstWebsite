<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function showAll()
    {
        $articles = Article::get();

        return view('blog.posts', ['articles' => $articles]);
    }

    public function showOne($id)
    {
        $article = Article::find($id);

        $comments = Article::find($id)->comments;

        dump($comments);
        return view('blog.post', [
            'article'  => $article,
            'comments' => $comments
        ]);
    }

    public function adminMain()
    {
        $articles = Article::get();

        return view('admin.main', ['articles' => $articles]);
    }
}
