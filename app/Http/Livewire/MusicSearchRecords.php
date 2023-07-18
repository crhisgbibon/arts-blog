<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\AuthorModel;

class MusicSearchRecords extends Component
{
  public AuthorModel $model;

  public $input;
  public $search_result;

  public bool $search;

  public $result_record_id;
  public $result_artist_id;
  public $result_name;
  public $result_year;
  public $result_stars;
  public $result_review;
  public $result_tags;

  public $artists;
  public $records;
  public $tags;

  public $create_artist_id;
  public $create_name;
  public $create_year;
  public $create_stars;
  public $create_review;
  public $create_tags;

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
    $this->tags = $this->model->GetTagReferences();
    return view('livewire.music-search-records');
  }

  public function search()
  {
    $this->search = true;
    $this->search_result = $this->model->SearchRecords($this->input);
    $this->search_result = $this->search_result->sortBy('name');
  }

  public function edit(int $index)
  {
    $this->search = false;
    $result = $this->model->GetRecordById($index);
    $this->result_record_id = $result->id;
    $this->result_artist_id = $result->artist_id;
    $this->result_name = $result->name;
    $this->result_year = $result->release_year;
    $this->result_stars = $result->stars;
    $this->result_review = $result->review;

    $tags = $this->model->GetTagsByReference(2, $result->id);
    $tag_ids = [];
    foreach($tags as $tag)
    {
      array_push($tag_ids, $tag->tag_id);
    }
    $this->result_tags = $tag_ids;
  }

  public function create()
  {
    $id = $this->model->create_music_record(
      (int)$this->create_artist_id,
      (string)$this->create_name,
      (int)$this->create_year,
      (int)$this->create_stars,
      (string)$this->create_review,
    );

    $outcome = $this->model->add_tags(
      2,
      (int)$id,
      (array)$this->create_tags,
    );
  }

  public function update()
  {
    $outcome = $this->model->edit_music_record(
      (int)$this->result_record_id,
      (int)$this->result_artist_id,
      (string)$this->result_name,
      (int)$this->result_year,
      (int)$this->result_stars,
      (string)$this->result_review,
    );

    $outcome = $this->model->edit_tags(
      2,
      (int)$this->result_record_id,
      (array)$this->result_tags
    );
  }

  public function delete()
  {
    $outcome = $this->model->delete_music_record(
      (int)$this->result_record_id);
  }
}