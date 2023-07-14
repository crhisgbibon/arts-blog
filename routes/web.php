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
    ->where('tag', '[0-9]+')
    ->name('music_tag');

  Route::get('/music/{letter}', 'letter')
    ->where('artist', '[a-z]+')
    ->name('music_letter');

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

  Route::get('/author_music', 'author_music')
    ->middleware(['auth', 'verified'])
    ->name('author_music');

  

  Route::post('/author_music/create_music_artist', 'create_music_artist')
    ->middleware(['auth', 'verified'])
    ->name('create_music_artist');

  Route::post('/author_music/edit_music_artist', 'edit_music_artist')
    ->middleware(['auth', 'verified'])
    ->name('edit_music_artist');

  Route::post('/author_music/delete_music_artist', 'delete_music_artist')
    ->middleware(['auth', 'verified'])
    ->name('delete_music_artist');


  
  Route::post('/author_music/create_music_record', 'create_music_record')
    ->middleware(['auth', 'verified'])
    ->name('create_music_record');

  Route::post('/author_music/edit_music_record', 'edit_music_record')
    ->middleware(['auth', 'verified'])
    ->name('edit_music_record');

  Route::post('/author_music/delete_music_record', 'delete_music_record')
    ->middleware(['auth', 'verified'])
    ->name('delete_music_record');



  Route::post('/author_music/create_music_track', 'create_music_track')
    ->middleware(['auth', 'verified'])
    ->name('create_music_track');

  Route::post('/author_music/edit_music_track', 'edit_music_track')
    ->middleware(['auth', 'verified'])
    ->name('edit_music_track');

  Route::post('/author_music/delete_music_track', 'delete_music_track')
    ->middleware(['auth', 'verified'])
    ->name('delete_music_track');



  Route::post('/author_music/create_music_tag', 'create_music_tag')
    ->middleware(['auth', 'verified'])
    ->name('create_music_tag');

  Route::post('/author_music/edit_music_tag', 'edit_music_tag')
    ->middleware(['auth', 'verified'])
    ->name('edit_music_tag');

  Route::post('/author_music/delete_music_tag', 'delete_music_tag')
    ->middleware(['auth', 'verified'])
    ->name('delete_music_tag');
});

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
