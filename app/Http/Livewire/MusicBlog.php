<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\AuthorModel;

class MusicBlog extends Component
{
  public AuthorModel $model;

  public $input;
  public $search_results;

  public bool $search;

  public $result_id;
  public $result_title;
  public $result_content;

  public $create_content;

  public function mount()
  {
    $this->model = new AuthorModel();
    $this->search = true;
  }

  public function render()
  {
    return view('livewire.music-blog');
  }

  public function search()
  {
    $this->search = true;
    $this->search_results = $this->model->SearchBlogs($this->input);
  }

  public function edit(int $index)
  {
    $this->search = false;
    $result = $this->model->GetBlogById($index);

    $this->result_id = $result->id;
    $this->result_title = $result->title;
    $this->result_content = $result->contents;
  }

  public function quick_create()
  {
    $id = $this->model->create_music_blog($this->input);

    $this->search();
  }

  public function create()
  {
    $id = $this->model->create_music_blog(
      $this->input,
      $this->create_content,
    );

    $this->search();
  }

  public function update()
  {
    $outcome = $this->model->edit_music_blog(
      (int)$this->result_id,
      (string)$this->result_title,
      (string)$this->result_content,
    );
  }

  public function delete()
  {
    $outcome = $this->model->delete_music_blog(
      (int)$this->result_id);
  }
}