<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{
  public function beranda()
  {
    return view('frontend.hotel.index');
  }
}
