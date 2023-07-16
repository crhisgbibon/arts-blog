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

  public $artists_all;
  public $influences;
  public $similar;

  public function mount()
  {
    $this->model = new AuthorModel();
  }

  public function search()
  {
    $this->artists_all = $this->model->GetArtists();
    $this->artists_all = $this->artists_all->sortBy('name');
    $this->influences = $this->model->GetInfluences();
    $this->similar = $this->model->GetSimilar();

    $this->artists_search = [];
    if($this->input !=='') $this->artists_search = $this->model->SearchArtists($this->input);
    if($this->input !=='') $this->artists_search = $this->artists_search->sortBy('name');
  }

  public function render()
  {
    return view('livewire.music-search-artists');
  }
}