@extends('frontend.layouts.v_master')

@section('title', $title)

@section('content')
  <div class="form-main">
    <div class="row">
      <div class="kol-md-12">
        <div class="mainpaket">
          <div class="judul">
            {!! $tampil->judul !!}
            <div class="tgl">
              Tanggal : {{ date('d F Y', strtotime($tampil->created_at)) }} &nbsp;, Disunting : {{ $tampil->author }}
            </div>
          </div>
          <div class="foto">
            <img src="{{ asset($tampil->images) }}" alt="Artikel">
          </div>
          <div class="deskripsi">
            <h4>DESKRIPSI</h4>
            <div class="isi">
              <div class="maincontent">
                <div class="tab-content current">
                  <div class="itinerary">
                    {!! $tampil->deskripsi !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
