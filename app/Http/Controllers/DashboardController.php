<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
      return view('backend.pt.dashboard');
    }

    public function profil()
    {
      return view('backend.pt.profile');
    }
}
