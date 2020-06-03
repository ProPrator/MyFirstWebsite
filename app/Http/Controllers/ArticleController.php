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

        if ($article->delete()) {

            $request->session()->flash('message',"Статья $name, вместе с коментариями относящимся к ней, удалена");
            $request->session()->flash('status', 'success');
        } else {
            $request->session()->flash('message',"Статья $name не удалена, что-то пошло не так");
            $request->session()->flash('status', 'danger');
        }

        return redirect()->route('admin');
    }

    public function edit(Request $request, $id)
    {
        $article = Article::find($id);

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name'        => 'required',
                'description' => 'required',
                'file'        => 'image',
                'text'        => 'required',

            ]);
        } else {

            return view('admin.edit', ['article' => $article]);
        }
    }
}
