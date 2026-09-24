<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'music_id' => $id,
            'content' => $request->content,
        ]);

        return redirect()->route('music.show', ['id' => $id]);
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->user_id !== Auth::id()) {
        abort(403);
    }

        return view('comments.edit', [
            'comment' => $comment,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        if ($comment->user_id !== Auth::id()) {
        abort(403);
    }

        $comment = Comment::findOrFail($id);
        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('music.show', ['id' => $comment->music_id])->with('success', 'Commentaire mis à jour avec succès.');
    }

    public function delete($id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->user_id !== Auth::id()) {
        abort(403);
    }
    
        $musicId = $comment->music_id;
        $comment->delete();

        return redirect()->route('music.show', ['id' => $musicId])->with('success', 'Commentaire supprimé avec succès.');
    }
}