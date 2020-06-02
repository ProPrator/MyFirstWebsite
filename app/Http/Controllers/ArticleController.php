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
        $article = Article::findOrFail($id);

        $comments = Article::findOrFail($id)->comments;

        return view('blog.post', [
            'article'  => $article,
            'comments' => $comments
        ]);
    }

    public function adminMain(Request $request)
    {
        $articles = Article::get();

        $message = $request->session()->get('message');
        $status  = $request->session()->get('status');

        return view('admin.main', [
            'articles' => $articles,
            'message'  => $message,
            'status'   => $status
            ]);
    }

    public function deleted(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $name = $article->name;


            $article->comments->delete();
            $article->delete();
            $request->session()->keep([
                'message' => "Статья $name, вместе с коментариями относящимся к ней, удалена",
                'status'  => 'success'
                ]);
//        } else {
//            $request->session()->keep([
//                'message' => "Статья $name не удалена, что-то пошло не так",
//                'status'  => 'danger'
//            ]);
//        }

        return redirect()->route('admin');
    }
}
