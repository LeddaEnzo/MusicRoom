<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Music;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello, World!';
});

Route::get('/test-auth', function () {
    if (Auth::check()) {
        return Auth::user()->name;
    }
    return 'Not authenticated';
});

Route::prefix('music')->name('music.')->group(function () {
    //afficher music
    Route::get('/', [MusicController::class, 'list'])->name('list');
    Route::get('/{id}', [MusicController::class, 'show'])->where('id', '[0-9]+')->name('show');

    //Créer musique
    Route::get('/create', function () {
        return view('create');
    })->name('create')->middleware('auth');
    Route::post('/create', [MusicController::class, 'create'])->name('create');

    //Modifier musique
    Route::get('/{id}/edit', [MusicController::class, 'edit_view'])->name('edit.view')->middleware('auth');
    Route::post('/{id}/edit', [MusicController::class, 'edit'])->name('edit')->middleware('auth');

    //Supprimer musique
    Route::get('/{id}/delete', [MusicController::class, 'delete'])->name('delete')->middleware('auth');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::post('/music/{id}/rate', [RatingController::class, 'rate'])->name('music.rate')->middleware('auth');

Route::post('/music/{id}/comment', [CommentController::class, 'store'])->name('music.comment')->middleware('auth');

Route::get('/comment/{id}/edit', [CommentController::class, 'edit'])->name('comment.edit')->middleware('auth');
Route::post('/comment/{id}/edit', [CommentController::class, 'update'])->name('comment.update')->middleware('auth');
Route::get('/comment/{id}/delete', [CommentController::class, 'delete'])->name('comment.delete')->middleware('auth');