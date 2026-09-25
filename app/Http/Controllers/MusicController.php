<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use App\Models\Rating;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class MusicController extends Controller
{
    public function list() {
        $musics = Music::orderBy('name', 'asc')->get();
        $tri = 'name';
        $nextOrder = 'desc';
        return view('all', compact('musics', 'tri', 'nextOrder'));
    }

    public function show($id) {
        $music = Music::findOrFail($id);
        $userRating = null;

        if (Auth::check()) {
            $userRating = Rating::where('music_id', $id)
                ->where('user_id', Auth::id())
                ->first();
        }

        $averageRating = Rating::where('music_id', $id)->avg('rating');
        
        $comments = Comment::with('user')->where('music_id', $id)->latest()->get();

        return view('show', compact('music', 'userRating', 'averageRating', 'comments'));

    }

    public function delete($id) {
        $music = Music::findOrFail($id);
        $music->delete();
        return redirect()
            ->route('music.list')
            ->with('Music successfully deleted.');
    }


    public function create(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'composer' => 'required|string|max:255',
            'game' => 'required|string|max:255',
            'precision' => 'required|string|max:255',
            'link' => 'required|url|max:255',
        ]);
        Music::create($validated);
        return redirect()
            ->route('music.list')
            ->with('Music successfully added.');
    }

    public function edit_view($id) {
        $music = Music::findOrFail($id);
        return view('edit', compact('music'));
    }

    public function edit(Request $request, $id) {
        $music = Music::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'composer' => 'required|string|max:255',
            'game' => 'required|string|max:255',
            'precision' => 'required|string|max:255',
            'link' => 'required|url|max:255',
        ]);
        $music->update($validated);
        return redirect()
            ->route('music.show', $music->id)
            ->with('Music successfully updated.');
    }

    public function trier(Request $request) {
        $tri = $request->input('tri');
        $order = $request->input('order', 'asc');
        if ($tri === 'composer') {
            $musics = Music::orderBy('composer', $order)->get();
        } elseif ($tri === 'game') {
            $musics = Music::orderBy('game', $order)->get();
        } elseif ($tri === 'name') {
            $musics = Music::orderBy('name', $order)->get();
        } else {
            $tri = 'name';
            $order = 'asc';
            $musics = Music::orderBy('name', $order)->get();
        }
        $nextOrder = $order === 'asc' ? 'desc' : 'asc';
        return view('all', compact('musics', 'tri', 'nextOrder'));
    }

    /* public function create_view() {
        return view('create');
    } */
}
