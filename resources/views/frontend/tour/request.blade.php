@extends('frontend.layouts.v_master')

@section('title', 'Request Tour')

@section('content')
  <div class="form-main">
    <div class="row">
      <div class="kol-md-12">
        <div class="search-panel-form">
          @include('frontend.layouts.flash')
          <h3>Request Tour Anda</h3>
          <form id="form-request-tour" action="{{ route('tour.kirim') }}" method="post" role="form">
            <div class="row">
              <div class="kol-md-12">
                <label>NAMA</label>
                <div class="form-group has-feedback">
                  <span class="form-control-feedback"><i class="fa fa-user"></i></span>
                  <input type="text" id="name" name="name" class="form-control" placeholder="Nama Lengkap" required>
                </div>
              </div>
              <div class="kol-md-12">
                <label>EMAIL</label>
                <div class="form-group has-feedback">
                  <span class="form-control-feedback"><i class="fa fa-envelope"></i></span>
                  <input type="email" id="email" name="email" class="form-control" placeholder="Email Anda" required>
                </div>
              </div>
              <div class="kol-md-12">
                <label>NOMOR TELEPON/HP</label>
                <div class="form-group has-feedback">
                  <span class="form-control-feedback"><i class="fa fa-phone"></i></span>
                  <input type="text" id="telephone" name="telephone" class="form-control" placeholder="Nomor Handphone" required rangelength="[8,15]">
                </div>
              </div>
              <div class="kol-md-12">
                <label>LOKASI</label>
                <div class="form-group has-feedback">
                  <span class="form-control-feedback"><i class="fa fa-map-marker"></i></span>
                  <input type="text" id="location" name="location" class="form-control" placeholder="Tempat yang akan di kunjungi.. nama negara atau kota" required>
                </div>
              </div>
              <div class="kol-md-12">
                <label>DURASI</label>
                <div class="form-group has-feedback">
                  <span class="form-control-feedback"><i class="fa fa-clock-o"></i></span>
                  <select class="form-control" id="duration" name="duration" required>
                    @for ($i=1; $i <= 31; $i++)
                      <option value="{!! $i !!}&nbsp;Hari">{!! $i !!}&nbsp;Hari</option>
                    @endfor
                  </select>
                </div>
              </div>
              <div class="kol-md-12">
                <label>PERMINTAAN KHUSUS</label>
                <div class="form-group">
                    {!! Form::textarea('note',null, ['class' => 'form-control', 'rows' => '5', 'cols' => '10']) !!}
                </div>
              </div>
              <div class="kol-md-12">
                <input type="checkbox" id="agree" required>&nbsp;Saya Menyetujui Bahwa Form Yang Diisi Adalah Benar.
              </div>
              <div class="kol-md-12">
                <div class="pull-right">
                  <button type="submit" id="btn-submit" name="btn-submit" class="btn btn-lg btn-primary" disabled><span class="fa fa-send"></span>&nbsp;Kirim</button>
                </div>
              </div>
            </div>
            {{ csrf_field() }}
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
