<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'idea_id' => 'required|exists:ideas,id',
        ]);

        Comment::create([
            'content' => $request->input('content'),
            'idea_id' => $request->input('idea_id'),
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Commentaire ajouté');
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Non autorisé');
        }

        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = Comment::findOrFail($id);

        if ($comment->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Non autorisé');
        }

        $comment->update([
            'content' => $request->input('content'),
        ]);

        return redirect()->back()->with('success', 'Commentaire modifié');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Non autorisé');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Commentaire supprimé');
    }
}
