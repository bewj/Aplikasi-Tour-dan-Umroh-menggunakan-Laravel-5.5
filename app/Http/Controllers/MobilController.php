<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MobilController extends Controller
{
  public function beranda()
  {
    return view('frontend.mobil.index');
  }
}
