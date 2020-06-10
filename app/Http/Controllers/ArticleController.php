<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /*
     * show all articles
     * and make pagination
     */
    public function showAll()
    {
        $articles = Article::paginate(5);

        return view('blog.posts', ['articles' => $articles]);
    }

    /*
     * show one article
     * and comments of this article with pagination.
     * if user authorized show form
     */
    public function showOne($id)
    {
        $article = Article::findOrFail($id);

        $comments = Article::findOrFail($id)->comments()->paginate(10);


        if (Auth::check()) {
            $showForm = true;
        } else {
            $showForm = false;
        }

        return view('blog.post', [
            'article'  => $article,
            'comments' => $comments,
            'showForm' => $showForm
        ]);
    }

    /*
     * show main admin page with all articles
     * with the ability to delete and edit
     */
    public function adminMain(Request $request)
    {
        $articles = Article::paginate(10);

        $message = $request->session()->get('message');
        $status  = $request->session()->get('status');

        return view('admin.main', [
            'articles' => $articles,
            'message'  => $message,
            'status'   => $status
            ]);
    }

    /*
     * delete article with all her comments
     */
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

    /*
     * show the article editing form
     */
    public function showEditForm($id)
    {
        $article = Article::find($id);

        return view('admin.edit', ['article' => $article]);

    }

    /*
     * editing article with validate
     */
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

    /*
     * adding article with validate
     */
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


}
