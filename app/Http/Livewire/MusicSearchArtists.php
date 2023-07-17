<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\AuthorModel;

class MusicSearchArtists extends Component
{
  public AuthorModel $model;

  public $input;
  public $artists_search;

  public bool $search;

  public $artist_result_id;
  public $artist_result_name;
  public $edit_influences;
  public $edit_similar;

  public $artists_all;
  public $influences;
  public $similar;

  public $create_name;
  public $create_influences;
  public $create_similar;

  public function mount()
  {
    $this->model = new AuthorModel();
    $this->artists_search;
    $this->search = true;
  }

  public function render()
  {
    $this->artists_all = $this->model->GetArtists();
    $this->influences = $this->model->GetInfluences();
    $this->similar = $this->model->GetSimilar();
    return view('livewire.music-search-artists');
  }

  public function search()
  {
    $this->search = true;
    $this->artists_search = $this->model->SearchArtists($this->input);
    $this->artists_search = $this->artists_search->sortBy('name');
  }

  public function edit(int $index)
  {
    $this->search = false;
    $artist_result = $this->model->GetArtistById($index);
    $this->artist_result_id = $artist_result->id;
    $this->artist_result_name = $artist_result->name;

    $this->edit_influences = [];

    foreach($this->influences as $in)
    {
      if($in['artist_id'] === $this->artist_result_id) array_push($this->edit_influences, $in['influence_id']);
    }

    $this->edit_similar = [];

    foreach($this->similar as $in)
    {
      if($in['artist_id'] === $this->artist_result_id) array_push($this->edit_similar, $in['similar_id']);
    }
  }

  public function create()
  {
    $id = $this->model->create_music_artist($this->create_name);

    $outcome1 = $this->model->add_influences(
      (int)$id,
      (array)$this->create_influences
    );

    $outcome2 = $this->model->add_similar(
      (int)$id,
      (array)$this->create_similar
    );
  }

  public function update()
  {
    $outcome = $this->model->edit_music_artist(
      (int)$this->artist_result_id,
      (string)$this->artist_result_name,
    );

    $outcome1 = $this->model->edit_influences(
      (int)$this->artist_result_id,
      (array)$this->edit_influences,
    );

    $outcome2 = $this->model->edit_similar(
      (int)$this->artist_result_id,
      (array)$this->edit_similar,
    );
  }

  public function delete()
  {
    $outcome = $this->model->delete_music_artist(
      (int)$this->artist_result_id);
  }
}