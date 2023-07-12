<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\MusicController;
use App\Http\Controllers\AuthorController;

Route::get('/', function () {
  return view('home');
});

Route::controller(MusicController::class)->group(function () {
  Route::get('/music', 'index')
    ->name('music');



  Route::get('/music/tags', 'tags')
    ->name('music_tags');

  Route::get('/music/tags/{tag}', 'tag')
    ->where('tag', '[a-zA-Z]+')
    ->name('music_tag');



  Route::get('/music/{artist}', 'artist')
    ->where('artist', '[0-9]+')
    ->name('music_artist');

  Route::get('/music/{artist}/{record}', 'record')
    ->where(['artist' => '[0-9]+', 'record' => '[0-9]+'])
    ->name('music_record');

  Route::get('/music/{artist}/{record}/{track}', 'track')
    ->where(['artist' => '[0-9]+', 'record' => '[0-9]+', 'track' => '[0-9]+'])
    ->name('music_track');
});

// Literature

// Film

// Art

// Author

Route::controller(AuthorController::class)->group(function () {

  Route::get('/author', 'index')->middleware(['auth', 'verified'])->name('author');
  
});

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
