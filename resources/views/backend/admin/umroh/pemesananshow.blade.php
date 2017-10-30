@extends('backend.layouts.master')

@section('title', 'DETAIL PEMESANAN UMROH')

@section('breadcrumb')
  <li><a href="{{ route('dashboard.admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li>Dashboard</li>
  <li class="{{ set_active('umroh.pemesanan.detail') }}">Detail Pemesanan Umroh</li>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">DETAIL PAKET TOUR</h3>
          <div class="pull-right">
            <a href="{{ route('tour.pemesanan.download',$pemesanan->id) }}" target="_blank" class="btn btn-sm btn-success">
              <i class="fa fa-download"></i>&nbsp;Download
            </a>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-condensed">
              <thead>
                <tr>
                  <th>Field</th>
                  <th>Content</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Nama</td>
                  <td>{{ $pemesanan->name }}</td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td>{{ $pemesanans->status }}</td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>{{ $pemesanan->email }}</td>
                </tr>
                <tr>
                  <td>Telepon</td>
                  <td>{{ $pemesanan->telephone }}</td>
                </tr>
                <tr>
                  <td>Paket Tour</td>
                  <td>{{ $pemesanan->package }}</td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td>Rp. {{ $pemesanan->price }}</td>
                </tr>
                <tr>
                  <td>Tanggal Tour</td>
                  <td>{!! date('d-F-Y',strtotime($pemesanan->departure_date)) !!}</td>
                </tr>
                <tr>
                  <td>Jumlah Peserta</td>
                  <td>{{ $pemesanan->participant }}</td>
                </tr>
                <tr>
                  <td>Total Harga</td>
                  {!! $harga = $pemesanan->price; $sum = $pemesanan->participant; $jumlah = $harga * $sum; !!}
                  <td>{!! $jumlah !!}</td>
                </tr>
                <tr>
                  <td>Catatan</td>
                  <td>{{ $pemesanan->note }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
