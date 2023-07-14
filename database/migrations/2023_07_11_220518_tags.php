<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('music_tags', function (Blueprint $table) {
      $table->id();
      $table->integer('ref_type');
      $table->integer('ref_id');
      $table->integer('tag_id');
      $table->boolean('hidden');
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('music_tags');
  }
};