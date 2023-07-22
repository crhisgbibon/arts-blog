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
  private string $blog = 'music_blog';

  // MUSIC

  public function GetArtists()
  {
    return $collection = DB::table($this->artists)
      ->select()
      ->where('hidden', '=', 0)
      ->orderBy('name', 'asc')
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

  public function GetInfluencesByArtist(int $artist_id)
  {
    return $collection = DB::table($this->influences)
      ->select()
      ->where('artist_id', '=', $artist_id)
      ->get();
  }

  public function GetSimilarsByArtist(int $artist_id)
  {
    return $collection = DB::table($this->similars)
      ->select()
      ->where('artist_id', '=', $artist_id)
      ->get();
  }

  public function GetRecords()
  {
    return $collection = DB::table($this->records)
      ->select()
      ->where('hidden', '=', 0)
      ->get();
  }

  public function GetRecordById(int $artist_id)
  {
    return $collection[0] = DB::table($this->records)
      ->select()
      ->where('hidden', '=', 0)
      ->where('id', '=', $artist_id)
      ->first();
  }

  public function GetTracks()
  {
    return $collection = DB::table($this->tracks)
      ->select()
      ->where('hidden', '=', 0)
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

  public function GetTagReferences()
  {
    return $collection = DB::table($this->tag_references)
      ->select()
      ->where('hidden', '=', 0)
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

  public function GetTags()
  {
    return $collection = DB::table($this->tags)
      ->select()
      ->where('hidden', '=', 0)
      ->get();
  }

  public function GetInfluences()
  {
    return $collection = DB::table($this->influences)
      ->select()
      ->where('hidden', '=', 0)
      ->get();
  }

  public function GetSimilar()
  {
    return $collection = DB::table($this->similars)
      ->select()
      ->where('hidden', '=', 0)
      ->get();
  }

  public function GetBlogById(int $blog_id)
  {
    return $collection[0] = DB::table($this->blog)
      ->select()
      ->where('hidden', '=', 0)
      ->where('id', '=', $blog_id)
      ->first();
  }

  public function create_music_artist(
    string $name)
  {
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');
    try
    {
      $id = DB::table($this->artists)->insertGetId([
        'name' => $name,
        'hidden' => 0,
        'created_at' => $now,
        'updated_at' => $now,
      ]);
    }
    catch(QueryException $e)
    {
      $id = -1;
    }

    return $id;
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
      $id = DB::table($this->records)->insertGetId([
        'artist_id' => $artist,
        'name' => $name,
        'release_year' => $year,
        'stars' => $stars,
        'review' => $review,
        'created_at' => $now,
        'updated_at' => $now,
        'hidden' => 0,
      ]);
    }
    catch(QueryException $e)
    {
      $id = -1;
    }

    return $id;
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

  public function add_tags(
    int $ref_type,
    int $ref_id,
    array $tags)
  {
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');

    try
    {
      $toInsert = [];

      foreach($tags as $tag)
      {
        $toInsert[] = [
          'ref_type' => $ref_type,
          'ref_id' => $ref_id,
          'tag_id' => $tag,
          'created_at' => $now,
          'updated_at' => $now,
          'hidden' => 0,
        ];
      }

      DB::table($this->tags)->insert($toInsert);

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

  public function edit_tags(
    int $ref_type,
    int $ref_id,
    array $tags)
  {
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');

    try
    {
      $existing = DB::table($this->tags)
        ->select('id')
        ->where('ref_type', '=', $ref_type)
        ->where('ref_id', '=', $ref_id)
        ->pluck('id');

      $dif = array_diff($existing->toArray(), $tags);

      DB::table($this->tags)
        ->whereIn('id', $dif)
        ->delete();

      $toInsert = [];

      foreach($tags as $tag)
      {
        $toInsert[] = [
          'ref_type' => $ref_type,
          'ref_id' => $ref_id,
          'tag_id' => $tag,
          'created_at' => $now,
          'updated_at' => $now,
          'hidden' => 0,
        ];
      }

      DB::table($this->tags)->insert($toInsert);

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

  public function add_influences(
    int $artist_id,
    array $influence_ids)
  {
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');

    try
    {
      $toInsert = [];

      foreach($influence_ids as $influence)
      {
        $toInsert[] = [
          'artist_id' => $artist_id,
          'influence_id' => (int)$influence,
          'stars' => 1,
          'created_at' => $now,
          'updated_at' => $now,
          'hidden' => 0,
        ];
      }

      DB::table($this->influences)->insert($toInsert);

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

  public function edit_influences(
    int $artist_id,
    array $influence_ids)
  {
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');

    try
    {
      $existing = DB::table($this->influences)
        ->select('id')
        ->where('artist_id', '=', $artist_id)
        ->pluck('id');

      DB::table($this->influences)
        ->whereIn('id', $existing)
        ->delete();

      $toInsert = [];

      foreach($influence_ids as $influence)
      {
        $toInsert[] = [
          'artist_id' => $artist_id,
          'influence_id' => (int)$influence,
          'stars' => 1,
          'created_at' => $now,
          'updated_at' => $now,
          'hidden' => 0,
        ];
      }

      DB::table($this->influences)->insert($toInsert);

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

  public function add_similar(
    int $artist_id,
    array $similar_ids)
  {
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');

    try
    {
      $toInsert = [];

      foreach($similar_ids as $sim)
      {
        $toInsert[] = [
          'artist_id' => $artist_id,
          'similar_id' => (int)$sim,
          'stars' => 1,
          'created_at' => $now,
          'updated_at' => $now,
          'hidden' => 0,
        ];
      }

      DB::table($this->similars)->insert($toInsert);

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

  public function edit_similar(
    int $artist_id,
    array $similar_ids)
  {
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');

    try
    {
      $existing = DB::table($this->similars)
        ->select('id')
        ->where('artist_id', '=', $artist_id)
        ->pluck('id');

      DB::table($this->similars)
        ->whereIn('id', $existing)
        ->delete();

      $toInsert = [];

      foreach($similar_ids as $sim)
      {
        $toInsert[] = [
          'artist_id' => $artist_id,
          'similar_id' => (int)$sim,
          'stars' => 1,
          'created_at' => $now,
          'updated_at' => $now,
          'hidden' => 0,
        ];
      }

      DB::table($this->similars)->insert($toInsert);

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

  public function SearchArtists(string $value)
  {
    if($value === '')
    {
      return $collection = DB::table($this->artists)
      ->select()
      ->where('hidden', '=', 0)
      ->where('name', 'LIKE', '%'.$value.'%')
      ->limit(10)
      ->orderBy('updated_at', 'desc')
      ->get();
    }
    else
    {
      return $collection = DB::table($this->artists)
      ->select()
      ->where('hidden', '=', 0)
      ->where('name', 'LIKE', '%'.$value.'%')
      ->get();
    }
  }

  public function SearchRecords(string $value)
  {
    if($value === '')
    {
      return $collection = DB::table($this->records)
      ->select()
      ->where('hidden', '=', 0)
      ->where('name', 'LIKE', '%'.$value.'%')
      ->limit(10)
      ->orderBy('updated_at', 'desc')
      ->get();
    }
    else
    {
      return $collection = DB::table($this->records)
      ->select()
      ->where('hidden', '=', 0)
      ->where('name', 'LIKE', '%'.$value.'%')
      ->get();
    }
  }

  public function SearchRecordsById(int $artist_id)
  {
    return $collection = DB::table($this->records)
    ->select()
    ->where('hidden', '=', 0)
    ->where('artist_id', '=', $artist_id)
    ->get();
  }

  public function GetTagsByReference(int $ref_type, int $ref_id)
  {
    return $collection = DB::table($this->tags)
      ->join($this->tag_references, $this->tag_references.'.id', '=', $this->tags.'.tag_id')
      ->select($this->tags.'.*', $this->tag_references.'.name')
      ->where($this->tags.'.hidden', '=', 0)
      ->where($this->tags.'.ref_type', '=', $ref_type)
      ->where($this->tags.'.ref_id', '=', $ref_id)
      ->get();
  }

  public function SearchTracks(string $value)
  {
    if($value === '')
    {
      return $collection = DB::table($this->tracks)
      ->select()
      ->where('hidden', '=', 0)
      ->where('name', 'LIKE', '%'.$value.'%')
      ->limit(10)
      ->orderBy('updated_at', 'desc')
      ->get();
    }
    else
    {
      return $collection = DB::table($this->tracks)
      ->select()
      ->where('hidden', '=', 0)
      ->where('name', 'LIKE', '%'.$value.'%')
      ->get();
    }
  }

  public function SearchTags(string $value)
  {
    if($value === '')
    {
      return $collection = DB::table($this->tag_references)
      ->select()
      ->where('hidden', '=', 0)
      ->where('name', 'LIKE', '%'.$value.'%')
      ->limit(10)
      ->orderBy('updated_at', 'desc')
      ->get();
    }
    else
    {
      return $collection = DB::table($this->tag_references)
      ->select()
      ->where('hidden', '=', 0)
      ->where('name', 'LIKE', '%'.$value.'%')
      ->get();
    }
  }

  public function create_music_blog(
    string $title,
    string $content,
    )
  {
    $nl2br = nl2br($contents);
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');

    try
    {
      $id = DB::table($this->blog)->insertGetId([
        'title' => $title,
        'contents' => $nl2br,
        'hidden' => 0,
        'created_at' => $now,
        'updated_at' => $now,
      ]);
    }
    catch(QueryException $e)
    {
      $id = -1;
    }

    return $id;
  }

  public function edit_music_blog(
    int $id,
    string $title,
    string $contents,
    )
  {
    $nl2br = nl2br($contents);
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');

    try
    {
      DB::table($this->blog)
        ->where('id', $id)
        ->update([
          'title' => $title,
          'contents' => $nl2br,
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

  public function delete_music_blog(
    int $id)
  {
    date_default_timezone_set("Europe/London");
    $now = date('Y-m-d H:i:s');
    try
    {
      DB::table($this->blog)
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

  public function SearchBlogs(string $value)
  {
    if($value === '')
    {
      return $collection = DB::table($this->blog)
      ->select()
      ->where('hidden', '=', 0)
      ->where('title', 'LIKE', '%'.$value.'%')
      ->limit(10)
      ->orderBy('updated_at', 'desc')
      ->get();
    }
    else
    {
      return $collection = DB::table($this->blog)
      ->select()
      ->where('hidden', '=', 0)
      ->where('title', 'LIKE', '%'.$value.'%')
      ->get();
    }
  }
}