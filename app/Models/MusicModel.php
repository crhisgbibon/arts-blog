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
  private string $tag_references = 'music_tag_references';
  private string $influences = 'music_influence';
  private string $similars = 'music_similar';
  
  // ARTISTS

  public function GetArtists()
  {
    return $collection = DB::table($this->artists)
      ->select()
      ->where('hidden', '=', 0)
      ->get();
  }

  public function GetTopTenArtistsByLastUpdated()
  {
    return $collection = DB::table($this->artists)
      ->select()
      ->where('hidden', '=', 0)
      ->orderBy('updated_at', 'asc')
      ->limit(10)
      ->get();
  }

  public function GetArtistById(int $artist_id)
  {
    return $collection[0] = DB::table($this->artists)
      ->select()
      ->where('hidden', '=', 0)
      ->where('id', '=', $artist_id)
      ->first();
  }

  public function GetArtistsById(array $artists)
  {
    return $collection[0] = DB::table($this->artists)
      ->select()
      ->where('hidden', '=', 0)
      ->whereIn('id', $artists)
      ->get();
  }

  public function GetArtistsByFirstLetter(string $letter)
  {
    return $collection = DB::table($this->artists)
      ->select()
      ->where('hidden', '=', 0)
      ->where('name', 'LIKE', $letter . '%')
      ->get();
  }

  // RECORDS

  public function GetRecords()
  {
    return $collection = DB::table($this->records)
      ->select()
      ->where('hidden', '=', 0)
      ->get();
  }

  public function GetTopTenRecordsByLastUpdated()
  {
    return $collection = DB::table($this->records)
      ->select()
      ->where('hidden', '=', 0)
      ->orderBy('updated_at', 'asc')
      ->limit(10)
      ->get();
  }

  public function GetRecordById(int $record_id)
  {
    return $collection = DB::table($this->records)
      ->select()
      ->where('hidden', '=', 0)
      ->where('id', '=', $record_id)
      ->first();
  }

  public function GetRecordsById(array $records)
  {
    return $collection[0] = DB::table($this->records)
      ->select()
      ->where('hidden', '=', 0)
      ->whereIn('id', $records)
      ->get();
  }

  public function GetRecordsByArtist(int $artist_id)
  {
    return $collection = DB::table($this->records)
      ->select()
      ->where('hidden', '=', 0)
      ->where('artist_id', '=', $artist_id)
      ->get();
  }

  public function GetArtistIdByRecordId(int $record_id)
  {
    return $id = DB::table($this->records)
      ->select('artist_id')
      ->where('hidden', '=', 0)
      ->where('id', '=', $record_id)
      ->value('artist_id');
  }

  public function GetRecordsByFirstLetter(string $letter)
  {
    return $collection = DB::table($this->records)
      ->select()
      ->where('hidden', '=', 0)
      ->where('name', 'LIKE', $letter . '%')
      ->get();
  }
  
  // TRACKS

  public function GetTracks()
  {
    return $collection = DB::table($this->tracks)
      ->select()
      ->where('hidden', '=', 0)
      ->get();
  }

  public function GetTopTenTracksByLastUpdated()
  {
    return $collection = DB::table($this->tracks)
      ->select()
      ->where('hidden', '=', 0)
      ->orderBy('updated_at', 'asc')
      ->limit(10)
      ->get();
  }

  public function GetTracksByRecord(int $record_id)
  {
    return $collection = DB::table($this->tracks)
      ->select()
      ->where('hidden', '=', 0)
      ->where('record_id', '=', $record_id)
      ->get();
  }

  public function GetTrackById(int $track_id)
  {
    return $collection = DB::table($this->tracks)
      ->select()
      ->where('hidden', '=', 0)
      ->where('id', '=', $track_id)
      ->first();
  }

  public function GetTracksById(array $tracks)
  {
    return $collection[0] = DB::table($this->tracks)
      ->select()
      ->where('hidden', '=', 0)
      ->whereIn('id', $tracks)
      ->get();
  }

  public function GetArtistIdByTrackId(int $track_id)
  {
    return $id = DB::table($this->tracks)
      ->select('artist_id')
      ->where('hidden', '=', 0)
      ->where('id', '=', $track_id)
      ->value('artist_id');
  }

  public function GetTracksByFirstLetter(string $letter)
  {
    return $collection = DB::table($this->tracks)
      ->select()
      ->where('hidden', '=', 0)
      ->where('name', 'LIKE', $letter . '%')
      ->get();
  }

  // TAGS

  public function GetTags()
  {
    return $collection = DB::table($this->tags)
      ->select()
      ->where('hidden', '=', 0)
      ->get();
  }

  public function GetUniqueTags()
  {
    return $collection = DB::table($this->tag_references)
      ->where('hidden', '=', 0)
      ->orderBy('name', 'asc')
      ->get();
  }

  public function GetTagById(int $tag_id)
  {
    return $collection = DB::table($this->tag_references)
      ->select()
      ->where('hidden', '=', 0)
      ->where('id', '=', $tag_id)
      ->first();
  }

  public function GetTagsByTag(int $tag_id)
  {
    return $collection = DB::table($this->tags)
      ->select()
      ->where('hidden', '=', 0)
      ->where('tag_id', '=', $tag_id)
      ->get();
  }

  // INFLUENCES

  public function GetInfluencesByArtist(int $artist_id)
  {
    return $collection = DB::table($this->influences)
      ->select()
      ->where('artist_id', '=', $artist_id)
      ->get();
  }

  public function GetInfluencedByArtist(int $artist_id)
  {
    return $collection = DB::table($this->influences)
      ->select()
      ->where('influence_id', '=', $artist_id)
      ->get();
  }

  // SIMILARS

  public function GetSimilarsByArtist(int $artist_id)
  {
    return $collection = DB::table($this->similars)
      ->select()
      ->where('artist_id', '=', $artist_id)
      ->get();
  }
}