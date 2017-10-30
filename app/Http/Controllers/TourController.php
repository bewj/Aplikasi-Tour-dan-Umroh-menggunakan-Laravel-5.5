<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Datatables;
use Yajra\DataTables\Html\Builder;
use App\Models\Tour as Tour;
use App\Models\BookingTour as Pemesanan;
use App\Models\RequestTour as MintaTour;
use PDF, Session, Validator;

class TourController extends Controller
{

    public function __construct()
    {
      $this->middleware('web');
    }

    // GENERATE CODE BOOKING //
    protected function code_booking($length)
    {
      $char = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
      $str = "";
      for ($i=1; $i <= $length; $i++) {
        $pos = rand(0, strlen($char)-1);
        $str .= $char{$pos};
      }
      return $str;
    }

    // CARI PAKET TOUR //
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
      $search = DB::table('tours')
                ->where('category',$tipe)
                ->whereMonth('start_period',$month)
                //->whereMonth('akhirperiode',$month)
                ->whereYear('start_period',$year)
                //->whereYear('akhirperiode',$year)
                ->get();
      return view('frontend.tour.search', compact('tipe','month','year','search'));
    }

    // Beranda Tour //
    public function beranda()
    {
      $domestik       = DB::table('tours')
                        ->where('status','Publish')->where('category', 'Domestik')
                        ->orderBy('created_at','desc')->orderBy('updated_at','desc')
                        ->paginate(5);
      $internasional  = DB::table('tours')
                        ->where('status','Publish')->where('category', 'Internasional')
                        ->orderBy('created_at','desc')->orderBy('updated_at','desc')
                        ->paginate(5);
      return view('frontend.tour.index',compact('domestik','internasional'));
    }

    // FORM REQUEST TOUR //
    public function permintaan()
    {
      return view('frontend.tour.request');
    }

    // KIRIM REQUEST TOUR //
    public function kirim_permintaan(Request $request)
    {
      $validator = Validator::make(request()->all(), [
        'name'      => 'required|string|max:30',
        'email'     => 'required|email|max:50',
        'telephone' => 'required|numeric|max:15',
        'location'  => 'required|string',
        'duration'  => 'required',
        'note'      => 'max:160'
      ]);
      if($validator->fails()) {
        redirect()->back()->withErrors($validator->errors());
      }
      MintaTour::create([
        'code_booking' => $this->code_booking(10),
        'name'      => $request->name,
        'email'     => $request->email,
        'telephone' => $request->telephone,
        'location'  => $request->location,
        'duration'  => $request->duration,
        'note'      => $request->note
      ]);
      Session::flash("flash_notification", [
        "level"   => "success",
        "message" => "Permintaan anda telah dikirim. Kami akan memproses permintaan dalam kurun waktu 24 - 48 jam. <p>Silahkan cek email anda.</p>"
      ]);
      return redirect()->route('tour.request');
    }

    // LIHAT DETAIL PAKET TOUR //
    public function lihat_paket($slug)
    {
      $tampil = Tour::where('slug', $slug)->first();
      return view('frontend.tour.view',compact('tampil'));
    }

    // FORM DETAIL PEMESANAN PAKET TOUR //
    public function form_pesan($slug)
    {
      $month = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni',
        '07' => 'Juli','08' => 'Agustus', '09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember'
      ];
      $tour = Tour::where('slug', $slug)->first();
      return view('frontend.tour.pesan',compact('tour','month'));
    }

    // KIRIM DETAIL PEMESANAN PAKET TOUR //
    public function sendForm_pesan(Request $request)
    {
      $validator = Validator::make(request()->all(), [
        'name'        => 'required|string|max:30',
        'email'       => 'required|email|max:100',
        'telephone'   => 'required|numeric|max:15',
        'days'        => 'required',
        'months'      => 'required',
        'years'       => 'required',
        'participant' => 'required|numeric',
        'note'        => 'required|max:160'
      ]);
      if($validator->fails()) {
        redirect()->back()->withErrors($validator->errors());
      }
      $tgl = [
        $request->days, $request->months, $request->years
      ];
      $join = implode('-',$tgl);
      $date = date('Y-m-d', strtotime($join));
      Pemesanan::create([
        'code_booking'   => $this->code_booking(10),
        'name'           => $request->name,
        'email'          => $request->email,
        'telephone'      => $request->telephone,
        'package'        => $request->package,
        'price'          => $request->price,
        'participant'    => $request->participant,
        'departure_date' => $date,
        'note'           => $request->note
      ]);
      Session::flash("flash_notification", [
        "level"   => "success",
        "message" => "Pemesanan tour telah dikirim. Kami akan memproses pemesanan dalam kurun waktu 24 - 48 Jam. Silahkan cek email anda."
      ]);
      return view('frontend.tour.sendPemesanan');
    }

    // DAFTAR PAKET TOUR //
    public function index(Request $request, Builder $htmlBuilder)
    {
      if ($request->ajax()) {
        $tours = Tour::select(['tour_id','title', 'author', 'category', 'status']);
        return DataTables::of($tours)
          ->addColumn('action', function($tours){
            return view('backend.layouts.action', [
              'model' => $tours,
              'edit_url' => route('tour.edit',$tours->tour_id),
              'detail_url' => route('tour.show',$tours->tour_id),
              'del_url' => route('tour.destroy',$tours->tour_id)
            ]);
          })
          ->make(true);
      }
      $html = $htmlBuilder
              ->addColumn(['data' => 'title', 'name' => 'title', 'title' => 'Nama Paket'])
              ->addColumn(['data' => 'author', 'name' => 'author', 'title' => 'Author'])
              ->addColumn(['data' => 'category', 'name' => 'category', 'title' => 'Kategori'])
              ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status'])
              ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false]);
      return view('backend.admin.tour.index')->with(compact('html'));
    }

    // FORM TAMBAH PAKET TOUR //
    public function create()
    {
        return view('backend.admin.tour.create');
    }

    // SIMPAN PAKET TOUR //
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
        $tours = Tour::create([
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
          'terms_conditions' => $request->terms_conditions
        ]);
        Session::flash("flash_notification", [
          "level"   => "success",
          "message" => "Paket Tour Berhasil Disimpan"
        ]);
        return redirect()->route('tour.index');
    }

    // DETAIL PAKET TOUR //
    public function show($tour_id)
    {
        $tour = Tour::find($tour_id);
        return view('backend.admin.tour.show', compact('tour'));
    }

    // FORM EDIT PAKET TOUR //
    public function edit($tour_id)
    {
        $tour = Tour::find($tour_id);
        return view('backend.admin.tour.edit', compact('tour'));
    }

    // UBAH PAKET TOUR //
    public function update(Request $request, $tour_id)
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
      $tours = Tour::find($tour_id);
      $tours->update([
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
        "message" => "Paket Tour Berhasil Dirubah"
      ]);
      return redirect()->route('tour.index');
    }

    // HAPUS PAKET TOUR //
    public function destroy($tour_id)
    {
        $tour = Tour::find($tour_id);
        $tour->delete();
        Session::flash("flash_notification", [
          "level"   => "success",
          "message" => "Paket Tour Berhasil Dihapus"
        ]);
        return redirect()->route('tour.index');
    }

    // DAFTAR PEMESANAN TOUR //
    public function beranda_pemesanan(Request $request, Builder $htmlBuilder)
    {
      if ($request->ajax()) {
        $pemesanans = Pemesanan::select(['id', 'code_booking', 'name', 'email', 'telephone', 'package', 'status']);
        return DataTables::of($pemesanans)
          ->addColumn('action', function($pemesanans){
            return view('backend.layouts.action', [
              'model' => $pemesanans,
              'edit_url' => route('tour.pemesanan.edit',$pemesanans->id),
              'detail_url' => route('tour.pemesanan.show',$pemesanans->id),
              'del_url' => route('tour.pemesanan.destroy',$pemesanans->id)
            ]);
          })
          ->make(true);
      }
      $html = $htmlBuilder
              ->addColumn(['data' => 'code_booking', 'name' => 'code_booking', 'title' => 'Kode'])
              ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Nama Pemesan'])
              ->addColumn(['data' => 'email', 'name' => 'email', 'title' => 'Email'])
              ->addColumn(['data' => 'telephone', 'name' => 'telephone', 'title' => 'Telepon'])
              ->addColumn(['data' => 'package', 'name' => 'package', 'title' => 'Paket Tour'])
              ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status'])
              ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false]);
      return view('backend.admin.tour.pemesanan')->with(compact('html'));
    }

    // DETAIL PEMESANAN TOUR //
    public function show_pemesanan($id)
    {
      $pemesanans = Pemesanan::find($id);
      $jumlah = $pemesanans->price * $pemesanans->participant;
      return view('backend.admin.tour.pemesananshow',compact('pemesanans','jumlah'));
    }

    // EDIT PEMESANAN TOUR //
    public function edit_pemesanan($id)
    {
      $pemesanans = Pemesanan::find($id);
      return view('backend.admin.tour.pemesananedit',compact('pemesanans'));
    }

    // UPDATE PEMESANAN TOUR //
    public function update_pemesanan(Request $request, $id)
    {
      $pemesanans = Pemesanan::find($id);
      $pemesanans->update([
        'status' => $request->status
      ]);
      Session::flash("flash_notification", [
        "level"   => "success",
        "message" => "Status Pemesanan Berhasil Dirubah"
      ]);
      return redirect()->route('tour.pemesanan');
    }

    // HAPUS PEMESANAN TOUR //
    public function destroy_pemesanan($id)
    {
      $pemesanan = Pemesanan::find($id);
      $pemesanan->delete();
      Session::flash("flash_notification", [
        "level"   => "success",
        "message" => "Data Pemesanan Berhasil Dihapus"
      ]);
      return redirect()->route('tour.pemesanan');
    }

    // DAFTAR PERMINTAAN TOUR //
    public function beranda_permintaan(Request $request, Builder $htmlBuilder)
    {
      if ($request->ajax()) {
        $Rtours = MintaTour::select(['id','code_booking', 'name', 'telephone', 'email', 'status']);
        return DataTables::of($Rtours)
          ->addColumn('action', function($Rtours){
            return view('backend.layouts.action', [
              'model' => $Rtours,
              'edit_url' => route('tour.permintaan.edit',$Rtours->id),
              'detail_url' => route('tour.permintaan.detail',$Rtours->id),
              'del_url' => route('tour.permintaan.destroy',$Rtours->id)
            ]);
          })
          ->make(true);
      }
      $html = $htmlBuilder
              ->addColumn(['data' => 'code_booking', 'name' => 'code_booking', 'title' => 'Kode'])
              ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Nama'])
              ->addColumn(['data' => 'telephone', 'name' => 'telephone', 'title' => 'Telepon'])
              ->addColumn(['data' => 'email', 'name' => 'email', 'title' => 'Email'])
              ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status'])
              ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false]);
      return view('backend.admin.tour.permintaan')->with(compact('html'));
    }

    // DETAIL PERMINTAAN TOUR //
    public function show_permintaan($id)
    {
      $Rtour = MintaTour::find($id);
      return view('backend.admin.tour.permintaanshow',compact('Rtour'));
    }

    // EDIT PERMINTAAN TOUR //
    public function edit_permintaan($id)
    {
      $Rtour = MintaTour::find($id);
      return view('backend.admin.tour.permintaanedit',compact('Rtour'));
    }

    // UPDATE PERMINTAAN TOUR //
    public function update_permintaan(Request $request, $id)
    {
      $Rtour = MintaTour::find($id);
      $Rtour->update([
        'status' => $request->status,
      ]);
      Session::flash("flash_notification", [
        "level"   => "success",
        "message" => "Status Permintaan Berhasil Dirubah"
      ]);
      return redirect()->route('tour.permintaan');
    }

    // HAPUS PERMINTAAN TOUR //
    public function destroy_permintaan($id)
    {
      $Rtour = MintaTour::find($id);
      $Rtour->delete();
      Session::flash("flash_notification", [
        "level"   => "success",
        "message" => "Permintaan Tour Berhasil Dihapus"
      ]);
      return redirect()->route('tour.permintaan');
    }

    // Download Paket Tour //
    public function downloadPaket($slug)
    {
      $tour = Tour::where('slug', $slug)->first();
      $pdf  = PDF::loadView('backend.admin.tour.pdf',compact('tour'))
              ->setPaper('a4','Potrait')->save('files/'.$tour->judul.'-'.date('d-F-Y').'.pdf');
      return $pdf->download($tour->judul.'-'.date('d-F-Y').'.pdf');
    }

    // Download Pemesanan Tour //
    public function downloadPemesanan($id)
    {
      $Ptour = Pemesanan::find($id);
      $jumlah = $Ptour->price * $Ptour->participant;
      $pdf   = PDF::loadView('backend.admin.tour.pemesananpdf', compact('Ptour','jumlah'))
               ->setPaper('a4','Potrait')->save('files/'.$Ptour->name.'-'.$Ptour->package.'-'.date('d-F-Y').'.pdf');
      return $pdf->download($Ptour->name.'-'.$Ptour->package.'-'.date('d-F-Y').'.pdf');
    }

    // Download Permintaan Tour //
    public function downloadPermintaan($id)
    {
      $Rtour = MintaTour::find($id);
      $pdf   = PDF::loadView('backend.admin.tour.permintaanpdf',compact('Rtour'))
             ->setPaper('a4','Potrait')->save('files/'.$Rtour->name.'-'.$Rtour->location.'-'.date('d-F-Y').'.pdf');
      return $pdf->download($Rtour->name.'-'.$Rtour->location.'-'.date('d-F-Y').'.pdf');
    }
}
