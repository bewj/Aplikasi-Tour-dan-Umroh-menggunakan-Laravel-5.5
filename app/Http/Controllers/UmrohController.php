<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Datatables;
use Yajra\DataTables\Html\Builder;
use App\Models\Umroh as Umroh;
use App\Models\BookingUmroh as Pemesanan;
use PDF, Session, Validator;

class UmrohController extends Controller
{
    public function __construct()
    {
      $this->middleware('web');
    }

    // CARI PAKET UMROH //
    public function cari(Request $request)
    {
      $validator = Validator::make(request()->all(), [
        'package' => 'required',
        'month'   => 'required',
        'year'    => 'required'
      ]);
      if($validator->fails()) {
        redirect()->back()->withErrors($validator->errors());
      }
      $tipe   = $request->input('package');
      $month  = $request->input('month');
      $year   = $request->input('year');
      $search = DB::table('umrohs')
                ->where('package',$package)
                ->whereMonth('awalperiode',$month)
                //->whereMonth('akhirperiode',$month)
                ->whereYear('awalperiode',$year)
                //->whereYear('akhirperiode',$year)
                ->get();
      return view('frontend.umroh.search',compact('package','month','year','search'));
    }

    // BERANDA UMROH //
    public function beranda()
    {
      $umroh = DB::table('umrohs')
               ->where('status','Publish')
               ->orderBy('created_at','desc')->orderBy('updated_at','desc')
               ->paginate(5);
      return view('frontend.umroh.index',compact('umroh'));
    }

    // LIHAT DETAIL PAKET UMROH //
    public function lihat_paket($slug)
    {
      $tampil = Umroh::where('slug',$slug)->first();
      return view('frontend.umroh.view', compact('tampil'));
    }

    // FORM DETAIL PEMESANAN PAKET UMROH //
    public function form_pesan($slug)
    {
      $month = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni',
        '07' => 'Juli','08' => 'Agustus', '09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember'
      ];
      $umroh = Umroh::where('slug',$slug)->first();
      return view('frontend.umroh.pesan', compact('month','umroh'));
    }

    // KIRIM DETAIL PEMESANAN PAKET UMROH //
    public function sendForm_pesan(Request $request)
    {
      $validator = Validator::make(request()->all(), [
        'name'        => 'required|string|max:30',
        'email'       => 'required|email|max:100',
        'telephone'   => 'required|numeric|max:15',
        'participant' => 'required|numeric',
        'note'        => 'required|max:160'
      ]);
      if($validator->fails()) {
        redirect()->back()->withErrors($validator->errors());
      }
      Pemesanan::create([
        'name'        => $request->name,
        'email'       => $request->email,
        'telephone'   => $request->telephone,
        'package'     => $request->package,
        'price'       => $request->price,
        'participant' => $request->participant,
        'note'        => $request->note
      ]);
      Session::flash("flash_notification", [
        "level"   => "success",
        "message" => "Pemesanan umroh telah dikirim. Kami akan memproses pemesanan dalam kurun waktu 24 - 48 Jam. Silahkan cek email anda."
      ]);
      return view('frontend.umroh.sendPemesanan');
    }

    // DAFTAR PAKET UMROH //
    public function index(Request $request, Builder $htmlBuilder)
    {
        if($request->ajax()) {
          $umroh = Umroh::select(['umroh_id', 'title', 'author', 'category', 'status']);
          return DataTables::of($umroh)
          ->addColumn('action', function($umroh) {
            return view('backend.layouts.action', [
              'model' => $umroh,
              'edit_url' => route('umroh.edit',$umroh->umroh_id),
              'detail_url' => route('umroh.show',$umroh->umroh_id),
              'del_url' => route('umroh.destroy',$umroh->umroh_id)
            ]);
          })
          ->make(true);
        }
        $html = $htmlBuilder
                ->addColumn(['data' => 'title', 'name' => 'title', 'title' => 'Nama Paket'])
                ->addColumn(['data' => 'author', 'name' => 'author', 'title' => 'Author'])
                ->addColumn(['data' => 'category', 'name' => 'package', 'title' => 'Kategori'])
                ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status'])
                ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false]);
        return view('backend.admin.umroh.index')->with(compact('html'));
    }

    // FORM TAMBAH PAKET UMROH //
    public function create()
    {
        return view('backend.admin.umroh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
          'title'      => 'required|max:255', 'category'      => 'required',
          'fupload'    => 'required|uploaded|image', 'status' => 'required',
          'duration'   => 'required', 'start_period'          => 'required|date',
          'end_period' => 'required|date', 'price'            => 'required|numeric|max:13',
          'itinerary'  => 'required', 'terms_conditions'      => 'required',
        ]);
        if($validator->fails()) {
          redirect()->back()->withErrors($validator->errors());
        }
        $start  = date("Y-m-d", strtotime($request->start_period));
        $end    = date("Y-m-d", strtotime($request->end_period));
        $umrohs = Umroh::create([
          'title'            => $request->title,
          'slug'             => str_slug($request->title, '-'),
          'author'           => $request->author,
          'category'         => $request->category,
          'images'           => $request->fupload,
          'status'           => $request->status,
          'duration'         => $request->duration,
          'start_period'     => $start,
          'end_period'       => $end,
          'price'            => $request->price,
          'itinerary'        => $request->itinerary,
          'terms_conditions' => $request->terms_conditions,
        ]);
        Session::flash("flash_notification", [
          "level"   => "success",
          "message" => "Paket Umroh Berhasil Disimpan"
        ]);
        return redirect()->route('umroh.index');
    }

    // DETAIL PAKET UMROH //
    public function show($umroh_id)
    {
        $umroh = Umroh::find($umroh_id);
        return view('backend.admin.umroh.show',compact('umroh'));
    }

    // FORM EDIT PAKET UMROH //
    public function edit($umroh_id)
    {
        $umroh = Umroh::find($umroh_id);
        return view('backend.admin.umroh.edit', compact('umroh'));
    }

    // UBAH PAKET UMROH //
    public function update(Request $request, $umroh_id)
    {
      $validator = Validator::make(request()->all(), [
        'title'      => 'required|max:255', 'category'      => 'required',
        'images'     => 'required|uploaded|image', 'status' => 'required',
        'duration'   => 'required', 'start_period'          => 'required|date',
        'end_period' => 'required|date', 'price'            => 'required|numeric|max:13',
        'itinerary'  => 'required', 'terms_conditions'      => 'required',
      ]);
      if($validator->fails()) {
        redirect()->back()->withErrors($validator->errors());
      }
      $start  = date("Y-m-d", strtotime($request->start_period));
      $end    = date("Y-m-d", strtotime($request->end_period));
      $umrohs = Umroh::find($umroh_id);
      $umrohs->update([
        'title'            => $request->title,
        'slug'             => str_slug($request->title, '-'),
        'author'           => $request->author,
        'category'         => $request->category,
        'images'           => $request->images,
        'status'           => $request->status,
        'duration'         => $request->duration,
        'start_period'     => $start,
        'end_period'       => $end,
        'price'            => $request->price,
        'itinerary'        => $request->itinerary,
        'terms_conditions' => $request->terms_conditions,
      ]);
      Session::flash("flash_notification", [
        "level"   => "success",
        "message" => "Paket Umroh Berhasil Dirubah"
      ]);
      return redirect()->route('umroh.index');
    }

    // HAPUS PAKET UMROH //
    public function destroy($umroh_id)
    {
        $umroh = Umroh::find($umroh_id);
        $umroh->delete();
        Session::flash("flash_notification", [
          "level"   => "success",
          "message" => "Paket Umroh Berhasil Dihapus"
        ]);
        return redirect()->route('umroh.index');
    }

    // DAFTAR PEMESANAN UMROH //
    public function beranda_pemesanan(Request $request, Builder $htmlBuilder)
    {
      if ($request->ajax()) {
        $pemesanans = Pemesanan::select(['id','name', 'email', 'telephone', 'package', 'status']);
        return DataTables::of($pemesanans)
          ->addColumn('action', function($pemesanans){
            return view('backend.layouts.action', [
              'model' => $pemesanans,
              'edit_url' => route('umroh.pemesanan.edit',$pemesanans->id),
              'detail_url' => route('umroh.pemesanan.show',$pemesanans->id),
              'del_url' => route('umroh.pemesanan.destroy',$pemesanans->id)
            ]);
          })
          ->make(true);
      }
      $html = $htmlBuilder
      ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Nama Pemesan'])
      ->addColumn(['data' => 'email', 'name' => 'email', 'title' => 'Email'])
      ->addColumn(['data' => 'telephone', 'name' => 'telephone', 'title' => 'Telepon'])
      ->addColumn(['data' => 'package', 'name' => 'package', 'title' => 'Paket Umroh'])
      ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status'])
      ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false]);
      return view('backend.admin.umroh.pemesanan')->with(compact('html'));
    }

    // DETAIL PEMESANAN UMROH //
    public function show_pemesanan($id)
    {
      $pemesanans = Pemesanan::find($id);
      return view('backend.admin.umroh.pemesananshow',compact('pemesanans'));
    }

    // EDIT PEMESANAN UMROH //
    public function edit_pemesanan($id)
    {
      $pemesanans = Pemesanan::find($id);
      return view('backend.admin.umroh.pemesananedit',compact('pemesanans'));
    }

    // UPDATE PEMESANAN UMROH //
    public function update_pemesanan(Request $request, $id)
    {
      $pemesanans = Pemesanan::find($id);
      $Pemesanans->update([
        'status' => $request->status
      ]);
      Session::flash("flash_notification", [
        "level"   => "success",
        "message" => "Status Pemesanan Berhasil Dirubah"
      ]);
      return redirect()->route('umroh.pemesanan');
    }

    // HAPUS PEMESANAN UMROH //
    public function destroy_pemesanan($id)
    {
      $pemesanan = Pemesanan::find($id);
      $pemesanan->delete();
      Session::flash("flash_notification", [
        "level"   => "success",
        "message" => "Data Pemesanan Berhasil Dihapus"
      ]);
      return redirect()->route('umroh.pemesanan');
    }

    // DOWNLOAD PAKET UMROH //
    public function downloadPaket($slug)
    {
      $umroh = Umroh::where('slug',$slug)->first();
      $pdf   = PDF::loadView('backend.admin.umroh.pdf',compact('umroh'))
               ->setPaper('a4','Potrait')->save('files/'.$umroh->judul.'-'.date('d-F-Y').'.pdf');
      return $pdf->download($umroh->judul.'-'.date('d-F-Y').'.pdf');
    }

    // DOWNLOAD PEMESANAN TOUR //
    public function downloadPemesanan($id)
    {
      $Pumroh = Pemesanan::find($id);
      $pdf   = PDF::loadView('backend.admin.umroh.pemesananpdf',['Pumroh' => $Pumroh])
               ->setPaper('a4','Potrait')->save('files/'.$Pumroh->name.'-'.$Pumroh->package.'-'.date('d-F-Y').'.pdf');
      return $pdf->download($Pumroh->name.'-'.$Pumroh->package.'-'.date('d-F-Y').'.pdf');
    }
}
