<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class CommentController extends Controller
{
    public function allCommentsOfPost($id)
    {
        $nameArticle = Article::findOrFail($id)->value('name');

        $comments = Article::findOrFail($id)->comments;

        return view('admin.comments', [
            'nameArticle' => $nameArticle,
            'comments'    => $comments
        ]);
    }
}
