<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showAll()
    {
        return view('blog.posts');
    }

    public function showOne($id)
    {
        return view('blog.post');
    }
}
