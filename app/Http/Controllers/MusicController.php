<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\MusicModel;

class MusicController extends Controller
{
  public MusicModel $model;

  public function __construct()
  {
    $this->model = new MusicModel();
  }

  public function index()
  {
    $artists = $this->model->GetTopTenArtistsByLastUpdated();
    $records = $this->model->GetTopTenRecordsByLastUpdated();
    $tracks = $this->model->GetTopTenTracksByLastUpdated();

    return view('music.music',
    [
      'artists' => $artists,
      'records' => $records,
      'tracks' => $tracks,
    ]);
  }

  public function artist(int $artist_id)
  {
    $artist = $this->model->GetArtistById($artist_id);
    $records = $this->model->GetRecordsByArtist($artist_id);

    $influences = $this->model->GetInfluencesByArtist($artist_id);
    $influenced = $this->model->GetInfluencedByArtist($artist_id);
    $similars = $this->model->GetSimilarsByArtist($artist_id);

    $influences_artists = [];
    $influenced_artists = [];
    $similars_artists = [];

    foreach($influences as $influence)
    {
      if(!in_array($influence->influence_id, $influences_artists)) array_push($influences_artists, $influence->influence_id);
    }

    foreach($influenced as $influence)
    {
      if(!in_array($influence->artist_id, $influenced_artists)) array_push($influenced_artists, $influence->artist_id);
    }

    foreach($similars as $similar)
    {
      if(!in_array($similar->similar_id, $similars_artists)) array_push($similars_artists, $similar->similar_id);
    }

    $influences_data = $this->model->GetArtistsById($influences_artists);
    $influenced_data = $this->model->GetArtistsById($influenced_artists);
    $similars_data = $this->model->GetArtistsById($similars_artists);

    return view('music.artist',
    [
      'artist' => $artist,
      'records' => $records,
      'influences' => $influences_data,
      'influenced' => $influenced_data,
      'similars' => $similars_data,
    ]);
  }

  public function record(int $artist_id, int $record_id)
  {
    $artist_id = $this->model->GetArtistIdByRecordId($record_id);
    $artist = $this->model->GetArtistById($artist_id);
    $record = $this->model->GetRecordById($record_id);
    $tracks = $this->model->GetTracksByRecord($record_id);

    return view('music.record',
    [
      'artist' => $artist,
      'record' => $record,
      'tracks' => $tracks,
    ]);
  }

  public function track(int $artist_id, int $record_id, int $track_id)
  {
    $track = $this->model->GetTrackById($track_id);
    $artist = $this->model->GetArtistById($track->artist_id);
    $record = $this->model->GetRecordById($track->record_id);

    return view('music.track',
    [
      'artist' => $artist,
      'record' => $record,
      'track' => $track,
    ]);
  }

  public function tags()
  {
    $tags = $this->model->GetUniqueTags();

    return view('music.tags',
    [
      'tags' => $tags,
    ]);
  }

  public function tag(int $tag_id)
  {
    $tag_info = $this->model->GetTagById($tag_id);
    $tags = $this->model->GetTagsByTag($tag_id);

    $artists = [];
    $records = [];
    $tracks = [];

    foreach($tags as $tag)
    {
      if((int)$tag->ref_type === 1)
      {
        if(!in_array($tag->ref_id, $artists)) array_push($artists, $tag->ref_id);
      }
      else if((int)$tag->ref_type === 2)
      {
        if(!in_array($tag->ref_id, $records)) array_push($records, $tag->ref_id);
      }
      else if((int)$tag->ref_type === 3)
      {
        if(!in_array($tag->ref_id, $tracks)) array_push($tracks, $tag->ref_id);
      }
    }

    $artist_data = $this->model->GetArtistsById($artists);
    $record_data = $this->model->GetRecordsById($records);
    $track_data = $this->model->GetTracksById($tracks);

    return view('music.tag',
    [
      'tag' => $tag_info,
      'artists' => $artist_data,
      'records' => $record_data,
      'tracks' => $track_data,
    ]);
  }

  public function letter(string $letter)
  {
    $artists = $this->model->GetArtistsByFirstLetter($letter);
    $artists = $artists->sortBy('name');
    $records = $this->model->GetRecordsByFirstLetter($letter);
    $records = $records->sortBy('name');
    $tracks = $this->model->GetTracksByFirstLetter($letter);
    $tracks = $tracks->sortBy('name');

    return view('music.letter',
    [
      'letter' => $letter,
      'artists' => $artists,
      'records' => $records,
      'tracks' => $tracks,
    ]);
  }
}