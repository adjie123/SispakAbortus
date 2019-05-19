<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YaController extends Controller
{
  public function postGejala(Request $request)
  {
    $gejalas = $request->all();
    if ($gejalas['gejala'][0]=='G1'&&$gejalas['gejala'][1]=='G2') {
        return view('pages.hipotesa');
    }
  }
}
