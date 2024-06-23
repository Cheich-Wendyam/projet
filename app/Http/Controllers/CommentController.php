<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'rating' => $request->rating
        ]);

        return redirect()->back()->with('success', 'Commentaire envoyé avec succès!');
    
    }
    
}
