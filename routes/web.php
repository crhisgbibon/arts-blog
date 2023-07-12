<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MusicController;

Route::get('/', function () {
  return view('home');
});

Route::controller(MusicController::class)->group(function () {
  Route::get('/music', 'index')->name('music');

  Route::get('/music/{artist}', 'artist')->name('music_artist');
  Route::get('/music/{artist}/{record}', 'record')->name('music_record');
  Route::get('/music/{artist}/{record}/{track}', 'track')->name('music_track');

  Route::get('/music/tags', 'tags')->name('music_tags');
  Route::get('/music/tags/{tag}', 'tag')->name('music_tag');
});