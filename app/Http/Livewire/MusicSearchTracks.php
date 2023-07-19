<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\AuthorModel;

class MusicSearchTracks extends Component
{
  public AuthorModel $model;

  public $input;
  public $search_result;

  public bool $search;

  public $result_track_id;
  public $result_record_id;
  public $result_artist_id;
  public $result_position;
  public $result_name;
  public $result_stars;
  public $result_review;

  public $artists;
  public $records;
  public $tracks;

  public $create_artist_id;
  public $create_record_id;
  public $create_position;
  public $create_name;
  public $create_stars;
  public $create_review;

  public function mount()
  {
    $this->model = new AuthorModel();
    $this->search_result;
    $this->search = true;
  }

  public function render()
  {
    $this->artists = $this->model->GetArtists();
    $this->records = $this->model->GetRecords();
    $this->tracks = $this->model->GetTracks();
    return view('livewire.music-search-tracks');
  }

  public function search()
  {
    $this->search = true;
    $this->search_result = $this->model->SearchTracks($this->input);
    $this->search_result = $this->search_result->sortBy('name');
  }

  public function edit(int $index)
  {
    $this->search = false;
    $result = $this->model->GetTrackById($index);
    $this->result_track_id = $result->id;
    $this->result_record_id = $result->record_id;
    $this->result_artist_id = $result->artist_id;
    $this->result_position = $result->pos;
    $this->result_name = $result->name;
    $this->result_stars = $result->stars;
    $this->result_review = $result->review;
  }

  public function create()
  {
    $id = $this->model->create_music_track(
      (int)$this->create_artist_id,
      (int)$this->create_record_id,
      (int)$this->create_position,
      (string)$this->create_name,
      (int)$this->create_stars,
      (string)$this->create_review,
    );
  }

  public function update()
  {
    $outcome = $this->model->edit_music_track(
      (int)$this->result_track_id,
      (int)$this->result_artist_id,
      (int)$this->result_record_id,
      (int)$this->result_position,
      (string)$this->result_name,
      (int)$this->result_stars,
      (string)$this->result_review,
    );
  }

  public function delete()
  {
    $outcome = $this->model->delete_music_track(
      (int)$this->result_track_id);
  }
}