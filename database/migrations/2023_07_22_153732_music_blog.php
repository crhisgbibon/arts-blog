<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('music_blog', function (Blueprint $table) {
      $table->id();
      $table->string('title', 255);
      $table->string('contents', 6666);
      $table->boolean('hidden');
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('music_blog');
  }
};