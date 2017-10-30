@extends('backend.layouts.master')

@section('title', $title)

@section('breadcrumb')
  <li><a href="{{ route('dashboard.admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li>Dashboard</li>
  <li class="{{ set_active('tour.show') }}">Detail Paket Tour</li>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">DETAIL PAKET TOUR</h3>
          <div class="pull-right">
            <a href="{{ route('tour.download',$tour->slug) }}" target="_blank" class="btn btn-sm btn-success">
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
                  <td>Nama Paket</td>
                  <td>{{ $tour->title }}</td>
                </tr>
                <tr>
                  <td>Author</td>
                  <td>{{ $tour->author }}</td>
                </tr>
                <tr>
                  <td>Kategori</td>
                  <td>{{ $tour->category }}</td>
                </tr>
                <tr>
                  <td>Images</td>
                  <td><img src="{{ asset($tour->images) }}" width="100%" height="250px"></td>
                </tr>
                <tr>
                  <td>Durasi Perjalanan</td>
                  <td>{{ $tour->duration }}</td>
                </tr>
                <tr>
                  <td>Awal Periode</td>
                  <td>{!! date('d-F-Y',strtotime($tour->start_period)) !!}</td>
                </tr>
                <tr>
                  <td>Akhir Periode</td>
                  <td>{{ date('d-F-Y',strtotime($tour->end_period)) }}</td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td>Rp&nbsp;{{ $tour->price }}</td>
                </tr>
                <tr>
                  <td>Itinerary</td>
                  <td>{!! $tour->itinerary !!}</td>
                </tr>
                <tr>
                  <td>Syarat & Ketentuan</td>
                  <td>{!! $tour->terms_conditions !!}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
