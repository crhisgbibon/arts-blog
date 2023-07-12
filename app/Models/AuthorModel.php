<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AuthorModel extends Model
{
  use HasFactory;

  private string $artists = 'music_artists';
  private string $records = 'music_records';
  private string $tracks = 'music_tracks';
  private string $tags = 'music_tags';
  private string $influences = 'music_influence';
  private string $similars = 'music_similar';

  // ARTISTS

  public function GetArtists()
  {
    return $collection = DB::table($this->artists)
      ->select()
      ->get();
  }
}
