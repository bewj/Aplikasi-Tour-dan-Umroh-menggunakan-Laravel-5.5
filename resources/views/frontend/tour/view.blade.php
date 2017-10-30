@extends('frontend.layouts.v_master')

@section('title', $tampil->judul)

@section('content')
  <div class="form-main">
    <div class="row">
      <div class="kol-md-12">
        <div class="mainpaket">
          <div class="judul">
            {!! $tampil->title !!}
            <div class="tgl">
              Tanggal : {{ date('d F Y', strtotime($tampil->created_at)) }} &nbsp;, Disunting : {{ $tampil->author }}
            </div>
          </div>
          <div class="foto">
            <img src="{{ asset($tampil->images) }}" alt="Tour Domestik">
          </div>
          <div class="durasi_harga">
            <div class="pull-left">
              <span class="fa fa-clock-o"></span>&nbsp;DURASI : {!! $tampil->duration !!} <br>
              <span class="fa fa-calendar"></span>&nbsp;PERIODE : <?php echo date('d - F - Y', strtotime($tampil->start_period)); echo ' s/d '; echo date('d - F - Y',strtotime($tampil->end_period)); ?>
            </div>
            <div class="pull-right">
              <span class="fa fa-money"></span>&nbsp;HARGA : RP {!! $tampil->price !!}
              <p>* Harga termasuk Tiket Pesawat dan Hotel</p>
            </div>
          </div>
          <div class="deskripsi">
            <h4>DESKRIPSI</h4>
            <div class="isi">
              <div class="maincontent">
                <ul class="tabs">
                  <li class="tab-link current" data-tab="tab-itinerary">ITINERARY</li>
                  <li class="tab-link" data-tab="tab-syarat">SYARAT & KETENTUAN</li>
                </ul>
                <div id="tab-itinerary"class="tab-content current">
                  <div class="itinerary">
                    {!! $tampil->itinerary !!}
                  </div>
                </div>
                <div id="tab-syarat"class="tab-content">
                  <div class="termCondition">
                    {!! $tampil->terms_conditions !!}
                  </div>
                </div>
                <div class="pull-left">
                  <h3>BANTUAN DAN INFO LENGKAP SILAHKAN HUBUNGI 08210831313 ATAU WA 123121241241</h3>
                </div>
                <div class="pull-right" style="width: 20%;">
                  <a href="{{ route('tour.form_pesan',$tampil->slug)}}" class="btn btn-lg btn-primary"><span class="fa fa-envelope"></span>&nbsp;PESAN</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
