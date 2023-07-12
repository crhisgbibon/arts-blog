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
    if (!Gate::allows('is_admin'))
    {
      abort(403);
    }

    $this->model = new AuthorModel();
  }

  public function index()
  {
    return view('author.dashboard',
    [

    ]);
  }
}
