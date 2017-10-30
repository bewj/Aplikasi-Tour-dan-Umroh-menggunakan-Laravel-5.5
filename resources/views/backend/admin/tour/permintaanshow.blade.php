@extends('backend.layouts.master')

@section('title', 'DETAIL PERMINTAAN TOUR')

@section('breadcrumb')
  <li><a href="{{ route('dashboard.admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li>Dashboard</li>
  <li class="{{ set_active('tour.permintaan.detail') }}">Detail Permintaan Tour</li>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">DETAIL PERMINTAAN TOUR</h3>
          <div class="pull-right">
            <a href="{{ route('tour.download.permintaan',$Rtour->id) }}" target="_blank" class="btn btn-sm btn-success">
              <i class="fa fa-download"></i>&nbsp;Download
            </a>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-condensed">
              <tbody>
                <tr>
                  <td>NAMA PERMINTAAN</td>
                  <td>{{ $Rtour->name }}</td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td>{{ $Rtour->status }}</td>
                </tr>
                <tr>
                  <td>EMAIL PERMINTAAN</td>
                  <td>{{ $Rtour->email }}</td>
                </tr>
                <tr>
                  <td>TELEPON PERMINTAAN</td>
                  <td>{{ $Rtour->telephone }}</td>
                </tr>
                <tr>
                  <td>TEMPAT YANG AKAN DIKUNJUNGI</td>
                  <td>{{ $Rtour->location }}</td>
                </tr>
                <tr>
                  <td>Durasi</td>
                  <td>{{ $Rtour->duration }}</td>
                </tr>
                <tr>
                  <td>CATATAN PERMINTAAN</td>
                  <td>{{ $Rtour->note }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
