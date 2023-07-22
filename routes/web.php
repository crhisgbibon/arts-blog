<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MusicController;

Route::controller(MusicController::class)->group(function () {
  Route::get('/', 'index')
    ->name('home');
});

Route::controller(MusicController::class)->group(function () {

  Route::get('/tags', 'tags')
    ->name('music_tags');

  Route::get('/tags/{tag}', 'tag')
    ->where('tag', '[0-9]+')
    ->name('music_tag');



  Route::get('/letter', 'letters')
    ->name('music_letters');
  
  Route::get('/letter/{letter}', 'letter')
    ->where('letter', '[a-z-]+')
    ->name('music_letter');



  Route::get('/year', 'years')
    ->name('music_years');

  Route::get('/year/{year}', 'year')
    ->where('year', '[0-9]+')
    ->name('music_year');



  Route::get('/stars', 'stars')
    ->name('music_stars');

  Route::get('/stars/{star}', 'star')
    ->where('star', '[1-5]+')
    ->name('music_star');



  Route::get('/artists', 'artists')
    ->name('music_artists');

  Route::get('/records', 'records')
    ->name('music_records');

  Route::get('/tracks', 'tracks')
    ->name('music_tracks');

  Route::get('/{artist}', 'artist')
    ->where('artist', '[0-9]+')
    ->name('music_artist');

  Route::get('/{artist}/{record}', 'record')
    ->where(['artist' => '[0-9]+', 'record' => '[0-9]+'])
    ->name('music_record');

  Route::get('/{artist}/{record}/{track}', 'track')
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

  Route::get('/author_music/artists', 'author_music_artists')
    ->middleware(['auth', 'verified'])
    ->name('author_music_artists');

  Route::get('/author_music/records', 'author_music_records')
    ->middleware(['auth', 'verified'])
    ->name('author_music_records');

  Route::get('/author_music/tracks', 'author_music_tracks')
    ->middleware(['auth', 'verified'])
    ->name('author_music_tracks');

  Route::get('/author_music/tags', 'author_music_tags')
    ->middleware(['auth', 'verified'])
    ->name('author_music_tags');

  

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
