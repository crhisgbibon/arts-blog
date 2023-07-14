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
    $artists = $this->model->GetArtists();
    $artists = $artists->sortBy('name');
    $artists = $artists->toArray();

    $records = $this->model->GetRecords();
    $records = $records->sortBy('release_year');
    $records = $records->toArray();

    $tracks = $this->model->GetTracks();
    $tracks = $tracks->sortBy('pos');

    $tags = $this->model->GetTags();
    $tags = $tags->sortBy('name');

    return view('author.music',
    [
      'artists' => $artists,
      'records' => $records,
      'tracks' => $tracks,
      'tags' => $tags,
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

  public function create_music_artist(Request $request)
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

    $outcome = $this->model->create_music_artist($data->name);

    return response()->json($outcome);
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
    ]);

    $data = json_decode($request->data);

    $outcome = $this->model->edit_music_artist(
      (int)$data->id,
      (string)$data->name);

    return response()->json($outcome);
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
    ]);

    $data = json_decode($request->data);

    $outcome = $this->model->create_music_record(
      (int)$data->artist,
      (string)$data->name,
      (int)$data->year,
      (int)$data->stars,
      (string)$data->review);

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