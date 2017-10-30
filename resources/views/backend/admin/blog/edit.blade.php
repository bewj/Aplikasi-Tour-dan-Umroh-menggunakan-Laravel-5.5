@extends('backend.layouts.master')

@section('title', $title)

@section('breadcrumb')
  <li><a href="{{ route('dashboard.admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li>Dashboard</li>
  <li class="{{ set_active('blog.edit') }}">Edit Artikel</li>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">EDIT ARTIKEL</h3>
        </div>
        <div class="box-body">
          {!! Form::model($blog,['url' => route('blog.update',$blog->id), 'method' => 'put', 'class' => 'form-horizontal']) !!}
          <div class="form-group {{ $errors->has('name') ? 'has-error': ' '}}">
            <div class="form-group">
              {!! Form::label('judul','JUDUL', ['class' => 'col-md-2 control-label']) !!}
              <div class="col-md-9">
                {!! Form::text('judul',null, ['class' => 'form-control', 'placeholder' => 'JUDUL ARTIKEL']) !!}
                {!! $errors->first('judul','<p class="help-block"></p>') !!}
              </div>
            </div>
            <div class="form-group">
              {!! Form::label('status','STATUS', ['class' => 'col-md-2 control-label']) !!}
              <div class="col-md-9">
                <div class="radio">
                  <label style="margin-right: 10px;">
                    {!! Form::radio('status', 'Draft', true) !!} Draft
                  </label>
                  <label style="margin-right: 10px;">
                    {!! Form::radio('status', 'Publish') !!} Publish
                  </label>
                </div>
                {!! $errors->first('status','<p class="help-block"></p>') !!}
              </div>
            </div>
            <div class="form-group">
              {!! Form::label('gambar','GAMBAR', ['class' => 'col-md-2 control-label']) !!}
              <div class="col-md-9">
                <div class="input-group">
                  {!! Form::text('images', null, ['class'=>'form-control', 'id'=>'thumbnail', 'placeholder' => 'UPLOAD GAMBAR MAX 1']) !!}
                  <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-success">
                      <i class="fa fa-picture-o"></i>&nbsp;Pilih Gambar
                    </a>
                  </span>
                </div>
              </div>
            </div>
            <div class="form-group">
              {!! Form::label('deskripsi','DESKRIPSI', ['class' => 'col-md-2 control-label']) !!}
              <div class="col-md-9">
                {!! Form::textarea('deskripsi',null, ['class' => 'form-control']) !!}
                {!! $errors->first('deskripsi','<p class="help-block"></p>') !!}
              </div>
            </div>
            {!! Form::hidden('author', Auth::user()->name) !!}
            <div class="form-group">
              <div class="col-md-offset-2 col-md-9">
                {!! Form::button('<i class="fa fa-send"></i>&nbsp;SAVE DATA', ['class' => 'btn btn-primary','type' => 'submit']) !!}
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
