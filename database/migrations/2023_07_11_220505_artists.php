<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('music_artists', function (Blueprint $table) {
      $table->id();
      $table->string('name', 255)->unique();
      $table->boolean('hidden');
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('music_artists');
  }
};