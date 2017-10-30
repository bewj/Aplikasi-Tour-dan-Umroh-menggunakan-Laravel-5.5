<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tour as Tour;
use App\Models\Umroh as Umroh;
use App\Models\BookingTour as PemesananTour;
use App\Models\BookingUmroh as PemesananUmroh;
use App\Models\Articles as Artikel;
use App\Models\User as User;
use App\Models\PersonalData as Profile;
use App\Models\Education as Education;
use Auth;

class AdminController extends Controller
{
  public function __construct()
  {
    $this->middleware(['auth','role:admin']);
  }

  public function index()
  {
    $tours   = Tour::all();
    $umrohs  = Umroh::all();
    //$Ptours  = PemesananTour::all();
    //$Pumrohs = PemesananUmroh::all();
    $users = User::where('status','=','Activated')->get();
    $users1 = User::where('status','=','Pending')->get();
    $users2 = User::where('status','=','Blocked')->get();
    return view('backend.admin.dashboard',compact('users','users1','users2','tours','umrohs'));
  }

  public function profil()
  {
    $user = Auth::user()->name;

    return view('backend.admin.profile');
  }
}
