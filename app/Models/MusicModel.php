<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MusicModel extends Model
{
  use HasFactory;

  private string $artists = 'music_artists';
  private string $records = 'music_records';
  private string $tracks = 'music_tracks';
  private string $tags = 'music_tags';
  private string $influence = 'music_influence';
  private string $similar = 'music_similar';
  
  // ARTISTS

  public function GetArtists()
  {
    return $collection = DB::table($this->artists)
      ->select()
      ->get();
  }

  public function GetTopTenArtistsByLastUpdated()
  {
    return $collection = DB::table($this->artists)
      ->select()
      ->orderBy('updated_at', 'asc')
      ->limit(10)
      ->get();
  }

  public function GetArtistById(int $artist_id)
  {
    return $collection[0] = DB::table($this->artists)
      ->select()
      ->where('id', '=', $artist_id)
      ->first();
  }

  // RECORDS

  public function GetRecords()
  {
    return $collection = DB::table($this->records)
      ->select()
      ->get();
  }

  public function GetTopTenRecordsByLastUpdated()
  {
    return $collection = DB::table($this->records)
      ->select()
      ->orderBy('updated_at', 'asc')
      ->limit(10)
      ->get();
  }

  public function GetRecordById(int $record_id)
  {
    return $collection = DB::table($this->records)
      ->select()
      ->where('id', '=', $record_id)
      ->first();
  }

  public function GetRecordsByArtist(int $artist_id)
  {
    return $collection = DB::table($this->records)
      ->select()
      ->where('artist_id', '=', $artist_id)
      ->get();
  }

  public function GetArtistIdByRecordId(int $record_id)
  {
    return $id = DB::table($this->records)
      ->select('artist_id')
      ->where('id', '=', $record_id)
      ->value('artist_id');
  }
  
  // TRACKS

  public function GetTracks()
  {
    return $collection = DB::table($this->tracks)
      ->select()
      ->get();
  }

  public function GetTopTenTracksByLastUpdated()
  {
    return $collection = DB::table($this->tracks)
      ->select()
      ->orderBy('updated_at', 'asc')
      ->limit(10)
      ->get();
  }

  public function GetTracksByRecord(int $record_id)
  {
    return $collection = DB::table($this->tracks)
      ->select()
      ->where('record_id', '=', $record_id)
      ->get();
  }

  public function GetTrackById(int $track_id)
  {
    return $collection = DB::table($this->tracks)
      ->select()
      ->where('id', '=', $track_id)
      ->first();
  }

  public function GetArtistIdByTrackId(int $track_id)
  {
    return $id = DB::table($this->tracks)
      ->select('artist_id')
      ->where('id', '=', $track_id)
      ->value('artist_id');
  }

  // TAGS

  public function GetTags()
  {
    return $collection = DB::table($this->tags)
      ->select()
      ->get();
  }
}