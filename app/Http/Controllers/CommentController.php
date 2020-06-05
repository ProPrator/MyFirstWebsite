<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Article;

class CommentController extends Controller
{
    public function allComments($id)
    {
        $nameArticle = Article::findOrFail($id)->value('name');

        $comments = Article::findOrFail($id)->comments;

        return view('admin.comments', [
            'nameArticle' => $nameArticle,
            'comments'    => $comments
        ]);
    }

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

    private function flashMessage(Request $request, $message, $status)
    {
        $request->session()->flash('message',$message);
        $request->session()->flash('status', $status);

        return true;
    }
}
