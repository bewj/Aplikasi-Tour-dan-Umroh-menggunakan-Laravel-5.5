@extends('backend.layouts.master')

@section('title', 'Daftar Paket Tour')

@section('breadcrumb')
  <li><a href="{{ route('dashboard.admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li>Dashboard</li>
  <li class="{{ set_active('tour.index') }}">Tour</li>
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12 col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          @include('backend.layouts.flash')
          <h3 class="box-title">DAFTAR PAKET TOUR</h3>
          <div class="pull-right">
            <a href="{{ route('tour.create') }}" class="btn btn-sm btn-primary">
              <i class="fa fa-plus"></i>&nbsp;Tambah Paket Tour
            </a>
          </div>
        </div>
        <div class="box-body no-padding">
          {!! $html->table(['class' => 'table table-striped table-bordered table-hover']) !!}
        </div>
        <div class="box-footer">
          <i>Daftar Paket Tour</i>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  {!! $html->scripts() !!}
@endsection
