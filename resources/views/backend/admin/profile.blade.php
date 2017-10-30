@extends('backend.layouts.master')

@section('title', 'Profile Dashboard Admin')

@section('breadcrumb')
  <li><a href="{{ route('dashboard.admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li>Dashboard</li>
  <li class="{{ set_active('dashboard.admin.profile') }}">Profile</li>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <!-- Column Left -->
      <div class="col-md-6">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Biodata Diri</h3>
          </div>
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td>NAMA</td>
                  <td>{{ config('app.name') }}</td>
                </tr>
                <tr>
                  <td>Tempat Lahir</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Tanggal Lahir</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Agama</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Kewarganegaraan</td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Column Right -->
      <div class="col-md-6">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Pendidikan</h3>
          </div>
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td>Asal Universitas</td>
                  <td>Nama Universitas</td>
                </tr>
                <tr>
                  <td>Pendidikan</td>
                  <td></td>
                </tr>
                <tr>
                  <td>IPK</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Tahun Lulus</td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
