@extends('backend.layouts.master')

@section('title', 'Detail '.$pemesanans->name)

@section('breadcrumb')
  <li><a href="{{ route('dashboard.admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li>Dashboard</li>
  <li class="{{ set_active('tour.pemesanan.show') }}">Detail pemesanan Tour</li>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">DETAIL PAKET TOUR</h3>
          <div class="pull-right">
            <a href="{{ route('tour.pemesanan.download',$pemesanans->id) }}" target="_blank" class="btn btn-sm btn-success">
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
                  <td>{{ $pemesanans->name }}</td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td>{{ $pemesanans->status }}</td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>{{ $pemesanans->email }}</td>
                </tr>
                <tr>
                  <td>Telepon</td>
                  <td>{{ $pemesanans->telephone }}</td>
                </tr>
                <tr>
                  <td>Paket Tour</td>
                  <td>{{ $pemesanans->package }}</td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td>Rp. {{ $pemesanans->price }}</td>
                </tr>
                <tr>
                  <td>Tanggal Tour</td>
                  <td>{!! date('d-F-Y',strtotime($pemesanans->departure_date)) !!}</td>
                </tr>
                <tr>
                  <td>Jumlah Peserta</td>
                  <td>{{ $pemesanans->participant }}</td>
                </tr>
                <tr>
                  <td>Total Harga</td>
                  <td>{!! $jumlah !!}</td>
                </tr>
                <tr>
                  <td>Catatan</td>
                  <td>{{ $pemesanans->note }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
