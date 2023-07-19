<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\AuthorModel;

class MusicSearchTags extends Component
{
  public AuthorModel $model;

  public $input;
  public $search_results;

  public bool $search;

  public $edit_id;
  public $edit_name;

  public $tags;

  public $create_name;

  public function mount()
  {
    $this->model = new AuthorModel();
    $this->search_results;
    $this->search = true;
  }

  public function render()
  {
    $this->tags = $this->model->GetTagReferences();
    return view('livewire.music-search-tags');
  }

  public function search()
  {
    $this->search = true;
    $this->search_results = $this->model->SearchTags($this->input);
    $this->search_results = $this->search_results->sortBy('name');
  }

  public function edit(int $index)
  {
    $this->search = false;
    $edit = $this->model->GetTagById($index);
    $this->edit_id = $edit->id;
    $this->edit_name = $edit->name;
  }

  public function create()
  {
    $id = $this->model->create_music_tag($this->create_name);
  }

  public function update()
  {
    $outcome = $this->model->edit_music_tag(
      (int)$this->edit_id,
      (string)$this->edit_name,
    );
  }

  public function delete()
  {
    $outcome = $this->model->delete_music_tag(
      (int)$this->edit_id);
  }
}