<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Music;
use App\Http\Controllers\MusicController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello, World!';
});

Route::get('/music', function () {
    return 'music';
});


Route::prefix('music')->name('music.')->group(function () {
    //afficher music
    Route::get('/', [MusicController::class, 'list'])->name('list');
    Route::get('/{id}', [MusicController::class, 'show'])->where('id', '[0-9]+')->name('show');

    //Créer musique
    Route::get('/create', function () {
        return view('music.create');
    })->name('music.create');
    Route::post('/create', [MusicController::class, 'create'])->name('music.create');

    //Modifier musique
    Route::get('/{id}/edit', [MusicController::class, 'edit_view'])->name('edit.view');
    Route::post('/{id}/edit', [MusicController::class, 'edit'])->name('edit');

    //Supprimer musique
    Route::get('/{id}/delete', [MusicController::class, 'delete'])->name('delete');
});