<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function list() {
        $musics = Music::all();
        return view('music.list', compact('musics'));
    }

    public function create_view() {
        return view('music.create');
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
    public function show($id) {
        $music = Music::findOrFail($id);
        return view('music.show', compact('music'));
    }

    public function edit_view($id) {
        $music = Music::findOrFail($id);
        return view('music.edit', compact('music'));
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
    public function delete($id) {
        $music = Music::findOrFail($id);
        $music->delete();
        return redirect()
            ->route('music.list')
            ->with('Music successfully deleted.');
    }
}
