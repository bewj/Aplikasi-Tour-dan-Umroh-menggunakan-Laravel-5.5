<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TiketController extends Controller
{
  public function beranda()
  {
    return view('frontend.tiket.index');
  }
}
