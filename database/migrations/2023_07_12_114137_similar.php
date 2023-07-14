<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('music_similar', function (Blueprint $table) {
      $table->id();
      $table->integer('artist_id');
      $table->integer('similar_id');
      $table->integer('stars');
      $table->boolean('hidden');
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('music_similar');
  }
};