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
      ->orderBy('updated_at', 'desc')
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
    $collection = DB::table($this->artists)
      ->select()
      ->where('hidden', '=', 0)
      ->get();

    return $this->FilterFirstLetter($letter, $collection);
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
      ->orderBy('updated_at', 'desc')
      ->limit(10)
      ->get();
  }

  public function GetRecordsByStars(int $star)
  {
    return $collection = DB::table($this->records)
      ->select()
      ->where('hidden', '=', 0)
      ->where('stars', '=', $star)
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

  public function GetRecordUniqueYears()
  {
    return $collection = DB::table($this->records)
      ->select('release_year')
      ->distinct()
      ->where('hidden', '=', 0)
      ->get();
  }

  public function GetYears()
  {
    return $collection = DB::table($this->records)
      ->distinct()
      ->select('release_year')
      ->where('hidden', '=', 0)
      ->pluck('release_year');
  }

  public function GetRecordsByYear(int $year)
  {
    return $collection = DB::table($this->records)
      ->select()
      ->where('hidden', '=', 0)
      ->where('release_year', '=', $year)
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
    $collection = DB::table($this->records)
      ->select()
      ->where('hidden', '=', 0)
      ->get();

    return $this->FilterFirstLetter($letter, $collection);
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
      ->orderBy('updated_at', 'desc')
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
    $collection = DB::table($this->tracks)
      ->select()
      ->where('hidden', '=', 0)
      ->get();

    return $this->FilterFirstLetter($letter, $collection);
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
  
  // GENERIC

  private function FilterFirstLetter(
    string $letter,
    $collection
  )
  {
    $result = collect();

    $the1 = 'The ';
    $the2 = 'the ';

    if($letter === '-')
    {
      foreach($collection as $item)
      {
        if(substr($item->name, 0, strlen($the1)) === $the1)
        {
          $substr = substr($item->name, strlen($the1));
          if(is_numeric($substr[0]) || $this->is_symbolic($substr[0])) $result->push($item);
        }
        elseif(substr($item->name, 0, strlen($the2)) === $the2)
        {
          $substr = substr($item->name, strlen($the2));
          if(is_numeric($substr[0]) || $this->is_symbolic($substr[0])) $result->push($item);
        }
        else
        {
          if(is_numeric($item->name[0]) || $this->is_symbolic($item->name[0])) $result->push($item);
        }
      }

    }
    else
    {
      foreach($collection as $item)
      {
        if(substr($item->name, 0, strlen($the1)) === $the1)
        {
          $substr = substr($item->name, strlen($the1));
          if(strtolower($substr[0]) === strtolower($letter)) $result->push($item);
        }
        elseif(substr($item->name, 0, strlen($the2)) === $the2)
        {
          $substr = substr($item->name, strlen($the2));
          if(strtolower($substr[0]) === strtolower($letter)) $result->push($item);
        }
        else
        {
          if(strtolower($item->name[0]) === strtolower($letter)) $result->push($item);
        }
      }
    }

    return $result;
  }

  private function is_symbolic($char)
  {
    return preg_match('/^[^\w\s]$/', $char);
  }
}