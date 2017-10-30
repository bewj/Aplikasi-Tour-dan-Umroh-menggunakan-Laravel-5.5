@extends('backend.layouts.master')

@section('title', 'Halaman Dashboard PT')

@section('breadcrumb')
  <li><a href="{{ route('dashboard.pt') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="{{ set_active('dashboard.pt') }}">Dashboard</li>
@endsection

@section('content')
  Jumlah Paket Tour, Jumlah Paket Umroh, Jumlah Penggunjung Website, Jumlah Pendaftaran Baru
  Jumlah Member, Jumlah Artikel, Pemesanan Baru, Email
@endsection
