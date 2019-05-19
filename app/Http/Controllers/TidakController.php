<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TidakController extends Controller
{
    public function index()
    {
      return view('pages.tidak');
    }
}
