<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class AuthorModel extends Model
{
  use HasFactory;

  private string $artists = 'music_artists';
  private string $records = 'music_records';
  private string $tracks = 'music_tracks';
  private string $tags = 'music_tags';
  private string $tag_references = 'music_tag_references';
  private string $influences = 'music_influence';
  private string $similars = 'music_similar';

  // MUSIC

  public function GetArtists()
  {
    return $collection = DB::table($this->artists)
      ->select()
      ->where('hidden', '=', 0)
      ->get();
  }

  public function GetRecords()
  {
    return $collection = DB::table($this->records)
      ->select()
      ->where('hidden', '=', 0)
      ->get();
  }

  public function GetTracks()
  {
    return $collection = DB::table($this->tracks)
      ->select()
      ->where('hidden', '=', 0)
      ->get();
  }

  public function GetTags()
  {
    return $collection = DB::table($this->tag_references)
      ->select()
      ->where('hidden', '=', 0)
      ->get();
  }

  public function create_music_artist(
    string $name)
  {
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');
    try
    {
      DB::table($this->artists)->insert([
        'name' => $name,
        'hidden' => 0,
        'created_at' => $now,
        'updated_at' => $now,
      ]);

      $response = [
        'status' => 'success',
        'message' => 'Data inserted successfully',
      ];
    }
    catch(QueryException $e)
    {
      $response = [
        'status' => 'error',
        'message' => 'Error inserting data: ' . $e->getMessage(),
      ];
    }

    return response()->json($response);
  }

  public function edit_music_artist(
    int $id,
    string $name)
  {
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');
    try
    {
      DB::table($this->artists)
        ->where('id', $id)
        ->update([
          'name' => $name,
          'updated_at' => $now,
        ]);

      $response = [
        'status' => 'success',
        'message' => 'Data inserted successfully',
      ];
    }
    catch(QueryException $e)
    {
      $response = [
        'status' => 'error',
        'message' => 'Error inserting data: ' . $e->getMessage(),
      ];
    }

    return response()->json($response);
  }

  public function delete_music_artist(
    int $id)
  {
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');
    try
    {
      DB::table($this->artists)
        ->where('id', $id)
        ->update([
          'hidden' => 1,
          'updated_at' => $now,
        ]);

      $response = [
        'status' => 'success',
        'message' => 'Data inserted successfully',
      ];
    }
    catch(QueryException $e)
    {
      $response = [
        'status' => 'error',
        'message' => 'Error inserting data: ' . $e->getMessage(),
      ];
    }

    return response()->json($response);
  }

  public function create_music_record(
    int $artist,
    string $name, 
    int $year, 
    int $stars, 
    string $review)
  {
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');
    try
    {
      DB::table($this->records)->insert([
        'artist_id' => $artist,
        'name' => $name,
        'release_year' => $year,
        'stars' => $stars,
        'review' => $review,
        'created_at' => $now,
        'updated_at' => $now,
        'hidden' => 0,
      ]);

      $response = [
        'status' => 'success',
        'message' => 'Data inserted successfully',
      ];
    }
    catch(QueryException $e)
    {
      $response = [
        'status' => 'error',
        'message' => 'Error inserting data: ' . $e->getMessage(),
      ];
    }

    return response()->json($response);
  }

  public function edit_music_record(
    int $id,
    int $artist,
    string $name,
    int $year,
    int $stars,
    string $review,
    )
  {
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');
    try
    {
      DB::table($this->records)
        ->where('id', $id)
        ->update([
          'artist_id' => $artist,
          'name' => $name,
          'release_year' => $year,
          'stars' => $stars,
          'review' => $review,
          'updated_at' => $now,
        ]);

      $response = [
        'status' => 'success',
        'message' => 'Data inserted successfully',
      ];
    }
    catch(QueryException $e)
    {
      $response = [
        'status' => 'error',
        'message' => 'Error inserting data: ' . $e->getMessage(),
      ];
    }

    return response()->json($response);
  }

  public function delete_music_record(
    int $id)
  {
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');
    try
    {
      DB::table($this->records)
        ->where('id', $id)
        ->update([
          'hidden' => 1,
          'updated_at' => $now,
        ]);

      $response = [
        'status' => 'success',
        'message' => 'Data inserted successfully',
      ];
    }
    catch(QueryException $e)
    {
      $response = [
        'status' => 'error',
        'message' => 'Error inserting data: ' . $e->getMessage(),
      ];
    }

    return response()->json($response);
  }

  public function create_music_track(
    int $artist,
    int $record,
    int $pos,
    string $name, 
    int $stars, 
    string $review)
  {
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');
    try
    {
      DB::table($this->tracks)->insert([
        'artist_id' => $artist,
        'record_id' => $record,
        'pos' => $pos,
        'name' => $name,
        'stars' => $stars,
        'review' => $review,
        'created_at' => $now,
        'updated_at' => $now,
        'hidden' => 0,
      ]);

      $response = [
        'status' => 'success',
        'message' => 'Data inserted successfully',
      ];
    }
    catch(QueryException $e)
    {
      $response = [
        'status' => 'error',
        'message' => 'Error inserting data: ' . $e->getMessage(),
      ];
    }

    return response()->json($response);
  }

  public function edit_music_track(
    int $id,
    int $artist,
    int $record,
    int $pos,
    string $name,
    int $stars,
    string $review,
    )
  {
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');
    try
    {
      DB::table($this->tracks)
        ->where('id', $id)
        ->update([
          'artist_id' => $artist,
          'record_id' => $record,
          'pos' => $pos,
          'name' => $name,
          'stars' => $stars,
          'review' => $review,
          'updated_at' => $now,
        ]);

      $response = [
        'status' => 'success',
        'message' => 'Data inserted successfully',
      ];
    }
    catch(QueryException $e)
    {
      $response = [
        'status' => 'error',
        'message' => 'Error inserting data: ' . $e->getMessage(),
      ];
    }

    return response()->json($response);
  }

  public function delete_music_track(
    int $id)
  {
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');
    try
    {
      DB::table($this->tracks)
        ->where('id', $id)
        ->update([
          'hidden' => 1,
          'updated_at' => $now,
        ]);

      $response = [
        'status' => 'success',
        'message' => 'Data inserted successfully',
      ];
    }
    catch(QueryException $e)
    {
      $response = [
        'status' => 'error',
        'message' => 'Error inserting data: ' . $e->getMessage(),
      ];
    }

    return response()->json($response);
  }

  public function create_music_tag(
    string $name)
  {
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');
    try
    {
      DB::table($this->tag_references)->insert([
        'name' => $name,
        'created_at' => $now,
        'updated_at' => $now,
        'hidden' => 0,
      ]);

      $response = [
        'status' => 'success',
        'message' => 'Data inserted successfully',
      ];
    }
    catch(QueryException $e)
    {
      $response = [
        'status' => 'error',
        'message' => 'Error inserting data: ' . $e->getMessage(),
      ];
    }

    return response()->json($response);
  }

  public function edit_music_tag(
    int $id,
    string $name)
  {
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');
    try
    {
      DB::table($this->tag_references)
        ->where('id', $id)
        ->update([
          'name' => $name,
          'updated_at' => $now,
        ]);

      $response = [
        'status' => 'success',
        'message' => 'Data inserted successfully',
      ];
    }
    catch(QueryException $e)
    {
      $response = [
        'status' => 'error',
        'message' => 'Error inserting data: ' . $e->getMessage(),
      ];
    }

    return response()->json($response);
  }

  public function delete_music_tag(
    int $id)
  {
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');
    try
    {
      DB::table($this->tag_references)
        ->where('id', $id)
        ->update([
          'hidden' => 1,
          'updated_at' => $now,
        ]);

      $response = [
        'status' => 'success',
        'message' => 'Data inserted successfully',
      ];
    }
    catch(QueryException $e)
    {
      $response = [
        'status' => 'error',
        'message' => 'Error inserting data: ' . $e->getMessage(),
      ];
    }

    return response()->json($response);
  }
}