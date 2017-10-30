<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Masukkan Model Detail Pemesanan dan Transaksi
use Session;
use Validator;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function __contruct()
    {
      $this->middleware('guest');
    }

    public function index()
    {
      $month = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni',
        '07' => 'Juli','08' => 'Agustus', '09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember'
      ];
      return view('frontend.beranda', ['month' => $month]);
    }

    public function menjadi_member()
    {
      return view('frontend.menjadimember');
    }

    public function carapemesanan()
    {
      return view('frontend.carapemesanan');
    }

    public function carapembayaran()
    {
      return view('frontend.carapembayaran');
    }

    public function aboutus()
    {
      return view('frontend.aboutus');
    }

    public function contactus()
    {
      return view('frontend.contactus');
    }

    public function hasil_cekpemesanan()
    {
      return view('frontend.hasilcekpemesanan');
    }

    public function cekpemesanan(Request $request)
    {
      $validator = Validator::make(request()->all(), [
        'order' => 'required',
        'email' => 'required|email|max:100'
      ]);
      if($validator->fails()) {
        redirect()->back()->withErrors($validator->errors());
      }
      // QUERY
      return redirect()->route('beranda.hasilCekPemesanan');
    }
}
