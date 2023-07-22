<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\AuthorModel;

use Illuminate\Support\Facades\Gate;

class AuthorController extends Controller
{
  public AuthorModel $model;

  public function __construct()
  {
    $this->model = new AuthorModel();
  }

  public function render()
  {
    return view('author.music2',
    [

    ]);

    $artists = $this->model->GetArtists();
    $artists = $artists->sortBy('name');
    $artists = $artists->toArray();

    $records = $this->model->GetRecords();
    $records = $records->sortBy('release_year');
    $records = $records->toArray();

    $tracks = $this->model->GetTracks();
    $tracks = $tracks->sortBy('pos');

    $references = $this->model->GetTagReferences();
    $references = $references->sortBy('name');

    $tags = $this->model->GetTags();

    $influences = $this->model->GetInfluences();
    $similar = $this->model->GetSimilar();

    return view('author.music',
    [
      'artists' => $artists,
      'records' => $records,
      'tracks' => $tracks,
      'tags' => $references,
      'actual_tags' => $tags,
      'influences' => $influences,
      'similar' => $similar,
    ]);
  }

  public function author_music()
  {
    if (!Gate::allows('is_admin'))
    {
      abort(403);
    }

    return $this->render();
  }

  public function author_music_artists()
  {
    if (!Gate::allows('is_admin'))
    {
      abort(403);
    }

    return view('author.artists',
    [

    ]);
  }

  public function author_music_records()
  {
    if (!Gate::allows('is_admin'))
    {
      abort(403);
    }

    return view('author.records',
    [

    ]);
  }

  public function author_music_tracks()
  {
    if (!Gate::allows('is_admin'))
    {
      abort(403);
    }

    return view('author.tracks',
    [

    ]);
  }

  public function author_music_tags()
  {
    if (!Gate::allows('is_admin'))
    {
      abort(403);
    }

    return view('author.tags',
    [

    ]);
  }

  public function author_music_blog()
  {
    if (!Gate::allows('is_admin'))
    {
      abort(403);
    }

    return view('author.blog',
    [

    ]);
  }



  public function create_music_artist(Request $request)
  {
    if (!Gate::allows('is_admin'))
    {
      abort(403);
    }

    $validatedData = $request->validate([
      'data' => 'required|json',
      'data.*.name' => 'required|string',
      'data.*.influences' => 'required|array',
      'data.*.similar' => 'required|array',
    ]);

    $data = json_decode($request->data);

    $id = $this->model->create_music_artist($data->name);

    $outcome1 = $this->model->add_influences(
      (int)$id,
      (array)$data->influences
    );

    $outcome2 = $this->model->add_similar(
      (int)$id,
      (array)$data->similar
    );

    return response()->json([$outcome1, $outcome2]);
  }

  public function edit_music_artist(Request $request)
  {
    if (!Gate::allows('is_admin'))
    {
      abort(403);
    }

    $validatedData = $request->validate([
      'data' => 'required|json',
      'data.*.id' => 'required|integer',
      'data.*.name' => 'required|string',
      'data.*.influences' => 'required|array',
      'data.*.similar' => 'required|array',
    ]);

    $data = json_decode($request->data);

    $outcome = $this->model->edit_music_artist(
      (int)$data->id,
      (string)$data->name,
    );

    $outcome1 = $this->model->edit_influences(
      (int)$data->id,
      (array)$data->influences,
    );

    $outcome2 = $this->model->edit_similar(
      (int)$data->id,
      (array)$data->similar,
    );

    return response()->json([$outcome1]);
  }

  public function delete_music_artist(Request $request)
  {
    if (!Gate::allows('is_admin'))
    {
      abort(403);
    }

    $validatedData = $request->validate([
      'data' => 'required|json',
      'data.*.id' => 'required|integer',
    ]);

    $data = json_decode($request->data);

    $outcome = $this->model->delete_music_artist(
      (int)$data->id);

    return response()->json($outcome);
  }

  public function create_music_record(Request $request)
  {
    if (!Gate::allows('is_admin'))
    {
      abort(403);
    }

    $validatedData = $request->validate([
      'data' => 'required|json',
      'data.*.artist' => 'required|integer',
      'data.*.name' => 'required|string',
      'data.*.year' => 'required|integer',
      'data.*.stars' => 'required|integer',
      'data.*.review' => 'required|string',
      'data.*.tags' => 'required|array',
    ]);

    $data = json_decode($request->data);

    $id = $this->model->create_music_record(
      (int)$data->artist,
      (string)$data->name,
      (int)$data->year,
      (int)$data->stars,
      (string)$data->review);

    $outcome = $this->model->add_tags(
      2,
      (int)$id,
      (array)$data->tags
    );
      
    return response()->json($outcome);
  }

  public function edit_music_record(Request $request)
  {
    if (!Gate::allows('is_admin'))
    {
      abort(403);
    }

    $validatedData = $request->validate([
      'data' => 'required|json',
      'data.*.id' => 'required|integer',
      'data.*.artist' => 'required|integer',
      'data.*.name' => 'required|string',
      'data.*.year' => 'required|integer',
      'data.*.stars' => 'required|integer',
      'data.*.review' => 'required|string',
      'data.*.tags' => 'required|array',
    ]);

    $data = json_decode($request->data);

    $outcome = $this->model->edit_music_record(
      (int)$data->id,
      (int)$data->artist,
      (string)$data->name,
      (int)$data->year,
      (int)$data->stars,
      (string)$data->review,
    );

    $outcome = $this->model->edit_tags(
      2,
      (int)$data->id,
      (array)$data->tags
    );

    return response()->json($outcome);
  }

  public function delete_music_record(Request $request)
  {
    if (!Gate::allows('is_admin'))
    {
      abort(403);
    }

    $validatedData = $request->validate([
      'data' => 'required|json',
      'data.*.id' => 'required|integer',
    ]);

    $data = json_decode($request->data);

    $outcome = $this->model->delete_music_record(
      (int)$data->id);

    return response()->json($outcome);
  }

  public function create_music_track(Request $request)
  {
    if (!Gate::allows('is_admin'))
    {
      abort(403);
    }

    $validatedData = $request->validate([
      'data' => 'required|json',
      'data.*.artist' => 'required|integer',
      'data.*.record' => 'required|record',
      'data.*.pos' => 'required|integer',
      'data.*.name' => 'required|string',
      'data.*.stars' => 'required|integer',
      'data.*.review' => 'required|string',
    ]);

    $data = json_decode($request->data);

    $outcome = $this->model->create_music_track(
      (int)$data->artist,
      (int)$data->record,
      (int)$data->pos,
      (string)$data->name,
      (int)$data->stars,
      (string)$data->review);

    return response()->json($outcome);
  }

  public function edit_music_track(Request $request)
  {
    if (!Gate::allows('is_admin'))
    {
      abort(403);
    }

    $validatedData = $request->validate([
      'data' => 'required|json',
      'data.*.id' => 'required|integer',
      'data.*.artist' => 'required|integer',
      'data.*.record' => 'required|integer',
      'data.*.pos' => 'required|integer',
      'data.*.name' => 'required|string',
      'data.*.stars' => 'required|integer',
      'data.*.review' => 'required|string',
    ]);

    $data = json_decode($request->data);

    $outcome = $this->model->edit_music_track(
      (int)$data->id,
      (int)$data->artist,
      (int)$data->record,
      (int)$data->pos,
      (string)$data->name,
      (int)$data->stars,
      (string)$data->review
    );

    return response()->json($outcome);
  }

  public function delete_music_track(Request $request)
  {
    if (!Gate::allows('is_admin'))
    {
      abort(403);
    }

    $validatedData = $request->validate([
      'data' => 'required|json',
      'data.*.id' => 'required|integer',
    ]);

    $data = json_decode($request->data);

    $outcome = $this->model->delete_music_track(
      (int)$data->id);

    return response()->json($outcome);
  }

  public function create_music_tag(Request $request)
  {
    if (!Gate::allows('is_admin'))
    {
      abort(403);
    }

    $validatedData = $request->validate([
      'data' => 'required|json',
      'data.*.name' => 'required|string',
    ]);

    $data = json_decode($request->data);

    $outcome = $this->model->create_music_tag(
      (string)$data->name,);

    return response()->json($outcome);
  }

  public function edit_music_tag(Request $request)
  {
    if (!Gate::allows('is_admin'))
    {
      abort(403);
    }

    $validatedData = $request->validate([
      'data' => 'required|json',
      'data.*.id' => 'required|integer',
      'data.*.name' => 'required|string',
    ]);

    $data = json_decode($request->data);

    $outcome = $this->model->edit_music_tag(
      (int)$data->id,
      (string)$data->name);

    return response()->json($outcome);
  }

  public function delete_music_tag(Request $request)
  {
    if (!Gate::allows('is_admin'))
    {
      abort(403);
    }

    $validatedData = $request->validate([
      'data' => 'required|json',
      'data.*.id' => 'required|integer',
    ]);

    $data = json_decode($request->data);

    $outcome = $this->model->delete_music_tag(
      (int)$data->id);

    return response()->json($outcome);
  }
}