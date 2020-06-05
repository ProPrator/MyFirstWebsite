<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Storage;

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
            $this->flashMessage($request, "Статья $name, вместе с коментариями относящимся к ней, удалена", 'success');
        } else {
            $this->flashMessage($request, "Статья $name не удалена, что-то пошло не так", 'danger');
        }

        return redirect()->route('admin');
    }

    public function showEditForm($id)
    {
        $article = Article::find($id);

        return view('admin.edit', ['article' => $article]);

    }

    public function edit(Request $request, $id)
    {
        $article = Article::find($id);

        $name = $article->name;

        $rules = [
            'name'        => 'required',
            'description' => 'required',
            'file'        => 'nullable|image',
            'text'        => 'required'
        ];

        $this->validate($request, $rules);

        $article->name        = $request->input('name');
        $article->description = $request->input('description');
        $article->text        = $request->input('text');

        if ($request->file) {

            Storage::disk('public')->delete($article->image);

            $path = $request->file('file')->store('images', 'public');

            $article->image = $path;
        }

        if ($article->save()) {
            $this->flashMessage($request, "Статья $name, успешно отредактированна", 'success');
        } else {
            $this->flashMessage($request, "Статья $name не отредактированна, что-то пошло не так", 'danger');
        }

        return redirect()->route('admin');
    }

    public function add(Request $request)
    {
        $rules = [
            'name'        => 'required',
            'description' => 'required',
            'file'        => 'file|image',
            'text'        => 'required'
        ];

        $this->validate($request, $rules);

        $article = new Article;

        $article->name        = $request->input('name');
        $article->description = $request->input('description');
        $article->text        = $request->input('text');

        if ($request->file) {

            $path = $request->file('file')->store('images', 'public');

            $article->image = $path;
        }

        $name = $article->name;

        if ($article->save()) {
            $this->flashMessage($request, "Статья $name, успешно отредактированна", 'success');
        } else {
            $this->flashMessage($request, "Статья $name не отредактированна, что-то пошло не так", 'danger');
        }

        return redirect()->route('admin');
    }

    private function flashMessage(Request $request, $message, $status)
    {
        $request->session()->flash('message',$message);
        $request->session()->flash('status', $status);

        return true;
    }
}
