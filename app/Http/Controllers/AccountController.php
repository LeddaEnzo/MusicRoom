<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use App\Models\Comment;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $ratings = Rating::with('music')->where('user_id', $user->id)->get();
        $comments = Comment::with('music')->where('user_id', $user->id)->latest()->get();

        return view('account', [
            'user' => $user,
            'ratings' => $ratings,
            'comments' => $comments,
        ]);
    }
}
