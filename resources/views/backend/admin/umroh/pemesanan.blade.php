@extends('backend.layouts.master')

@section('title', 'Daftar Request Tour')

@section('breadcrumb')
  <li><a href="{{ route('dashboard.admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li>Dashboard</li>
  <li class="{{ set_active('tour.pemesanan') }}">Daftar Pemesanan Umroh</li>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
          @include('backend.layouts.flash')
          <h3 class="box-title">DAFTAR PEMESANAN UMROH</h3>
        </div>
        <div class="box-body table-responsive no-padding">
          {!! $html->table(['class' => 'table table-striped table-bordered table-hover']) !!}
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  {!! $html->scripts() !!}
@endsection
