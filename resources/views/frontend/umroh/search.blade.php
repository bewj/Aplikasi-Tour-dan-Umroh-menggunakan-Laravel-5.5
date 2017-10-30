@extends('frontend.layouts.v_master')

@section('title','Pencarian Data')

@section('content')
  <div class="row" style="margin-top: 120px;">
    <div class="kol-md-12">
      <div class="hasil">
        <h1>PENCARIAN</h1>
        <p>Tipe Paket : {!! $package !!} &nbsp; Bulan : {!! $month !!} &nbsp; Tahun : {!! $year !!} &nbsp; Jumlah Data : {!! count($umroh) !!}</p>
      </div>
      @if (count($umroh))
        @foreach ($umroh as $umrohs)
          <div class="mainpaket">
            <div class="judul">
              <a href="{{ route('umroh.view',$umrohs->slug) }}">{{ $umrohs->judul }}</a>
              <div class="tgl">
                Tanggal : {{ date('d F Y', strtotime($umrohs->created_at)) }} &nbsp;, Disunting : {{ $umrohs->author }}
              </div>
            </div>
            <div class="foto">
              <img src="{{ asset('img/'.$umrohs->images) }}" alt="Tour Domestik">
            </div>
            <div class="durasi_harga">
              <div class="pull-left">
                <span class="fa fa-clock-o"></span>&nbsp;DURASI : {{ $umrohs->durasi }} <br>
                <span class="fa fa-calendar"></span>&nbsp;BERANGKAT : {!! date('d-F-Y', strtotime($umrohs->awalperiode)); echo ' s/d '; echo date('d-F-Y', strtotime($umrohs->akhirperiode)) !!}
              </div>
              <div class="pull-right">
                <span class="fa fa-money"></span>&nbsp;HARGA : RP {{ $umrohs->harga }}
              </div>
            </div>
            <div class="deskripsi"></div>
          </div>
        @endforeach
      @else
        <h3 class="notfound">PAKET UMROH TIDAK TERSEDIA</h3>
      @endif
    </div>
  </div>
@endsection
