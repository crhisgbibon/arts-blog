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



  Route::get('/years', 'years')
    ->name('music_years');

  Route::get('/years/{year}', 'year')
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



  Route::get('/blog', 'blog')
    ->name('music_blog');
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

  Route::get('/author_music/blog', 'author_music_blog')
    ->middleware(['auth', 'verified'])
    ->name('author_music_blog');
});

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
