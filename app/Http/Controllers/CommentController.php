<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    /*
     * show all article comments
     */
    public function allComments($id)
    {
        $nameArticle = Article::findOrFail($id)->value('name');

        $comments = Article::findOrFail($id)->comments()->paginate(10);

        return view('admin.comments', [
            'nameArticle' => $nameArticle,
            'comments'    => $comments
        ]);
    }

    /*
     * delete comment
     */
    public function delete(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        $name = $comment->article->name;

        if ($comment->delete()) {
            $this->flashMessage($request, "Комментарий к статье $name удален", 'success');
        } else {
            $this->flashMessage($request, "Комментарий к статье $name не удален, что-то пошло не так", 'danger');
        }

        return redirect()->route('admin');
    }

    /*
     * add comment
     */
    public function add(Request $request, $id)
    {
        $rules = ['text' => 'required'];

        $this->validate($request, $rules);

        $article = Article::findOrFail($id);
        $comment = new Comment;
        $user = Auth::user();

        $comment->text    = $request->input('text');

        $comment->article()->associate($article);
        $comment->user()->associate($user)->save();

        return redirect()->route('article', $article);
    }
}
