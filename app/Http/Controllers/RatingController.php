<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function rate(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:10',
        ]);

        Rating::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'music_id' => $id,
            ],
            [
                'rating' => $request->rating,
            ]
        );

        return redirect()->route('music.show', ['id' => $id]);
    }
}
