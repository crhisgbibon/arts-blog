<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('music_tracks', function (Blueprint $table) {
      $table->id();
      $table->integer('artist_id');
      $table->integer('record_id');
      $table->string('name', 255);
      $table->integer('stars');
      $table->string('review', 1000);
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('music_artists');
  }
};