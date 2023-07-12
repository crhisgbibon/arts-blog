<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MusicController;

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