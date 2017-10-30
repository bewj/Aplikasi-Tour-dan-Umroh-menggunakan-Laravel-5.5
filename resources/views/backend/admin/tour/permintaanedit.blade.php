@extends('backend.layouts.master')

@section('title', 'Daftar Request Tour')

@section('breadcrumb')
  <li><a href="{{ route('dashboard.admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li>Dashboard</li>
  <li class="{{ set_active('tour.permintaan.edit') }}">Edit Request Tour</li>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">EDIT REQUEST TOUR</h3>
        </div>
        <div class="box-body table-responsive no-padding">
          {!! Form::model($Rtour,['url' => route('tour.permintaan.update',$Rtour->id), 'method' => 'put', 'class' => 'form-horizontal'])!!}
          <div class="form-group {{ $errors->has('name') ? 'has-error': ''}}">
            <div class="form-group">
              {!! Form::label('name','NAMA PEMESAN', ['class' => 'col-md-2 control-label']) !!}
              <div class="col-md-9">
                {!! Form::text('name',null,['class' => 'form-control', 'readonly' => 'readonly'])!!}
                {!! $errors->first('name','<p class="help-block"></p>') !!}
              </div>
            </div>
            <div class="form-group">
              {!! Form::label('email','EMAIL PEMESAN', ['class' => 'col-md-2 control-label']) !!}
              <div class="col-md-9">
                {!! Form::email('email',null,['class' => 'form-control', 'readonly' => 'readonly'])!!}
                {!! $errors->first('email','<p class="help-block"></p>') !!}
              </div>
            </div>
            <div class="form-group">
              {!! Form::label('telephone','TELEPON PEMESAN', ['class' => 'col-md-2 control-label']) !!}
              <div class="col-md-9">
                {!! Form::tel('telephone',null,['class' => 'form-control', 'readonly' => 'readonly'])!!}
                {!! $errors->first('telephone','<p class="help-block"></p>') !!}
              </div>
            </div>
            <div class="form-group">
              {!! Form::label('location','TEMPAT TOUR', ['class' => 'col-md-2 control-label']) !!}
              <div class="col-md-9">
                {!! Form::text('location',null,['class' => 'form-control', 'readonly' => 'readonly'])!!}
                {!! $errors->first('location','<p class="help-block"></p>') !!}
              </div>
            </div>
            <div class="form-group">
              {!! Form::label('duration','TEMPAT TOUR', ['class' => 'col-md-2 control-label']) !!}
              <div class="col-md-9">
                {!! Form::text('duration',null,['class' => 'form-control', 'readonly' => 'readonly'])!!}
                {!! $errors->first('duration','<p class="help-block"></p>') !!}
              </div>
            </div>
            <div class="form-group">
              {!! Form::label('note','CATATAN', ['class' => 'col-md-2 control-label']) !!}
              <div class="col-md-9">
                {!! Form::textarea('note',null,['class' => 'form-control', 'readonly' => 'readonly'])!!}
                {!! $errors->first('note','<p class="help-block"></p>') !!}
              </div>
            </div>
            <div class="form-group">
              {!! Form::label('status','Status', ['class' => 'col-md-2 control-label']) !!}
              <div class="col-md-9">
                <div class="radio">
                  <label style="margin-right: 10px;">
                    {!! Form::radio('status', 'Approved') !!} Diterima
                  </label>
                  <label style="margin-right: 10px;">
                    {!! Form::radio('status', 'Pending', true) !!} Ditunda
                  </label>
                  <label style="margin-right: 10px;">
                    {!! Form::radio('status', 'Rejeceted') !!} Ditolak
                  </label>
                </div>
                {!! $errors->first('status','<p class="help-block"></p>') !!}
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-offset-2 col-md-9">
                {!! Form::button('<i class="fa fa-send"></i>&nbsp;UBAH DATA', ['class' => 'btn btn-primary','type' => 'submit']) !!}
                {!! Form::button('<i class="fa fa-times"></i>&nbsp;CANCEL', ['class' => 'btn btn-danger', 'type' => 'reset']) !!}
              </div>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
