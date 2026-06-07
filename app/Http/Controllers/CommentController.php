<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function update(Request $request, Comment $comment)
    {
        $request->validate(['content' => 'required']);
        $comment->update(['content' => $request->content]);
        
        return back()->with('success', 'Komentar berhasil diubah!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Komentar berhasil dihapus!');
    }
}
