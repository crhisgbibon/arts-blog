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

    return view('music.artist',
    [
      'artist' => $artist,
      'records' => $records,
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

  }

  public function tag()
  {

  }
}