@extends('frontend.layouts.v_master')

@section('title', 'Menjadi Member Sako Holidays')

@section('content')
  <div class="row" style="margin-top: 10px;">
    <div class="kol-md-12">
      <div class="" style="box-shadow: 0 0 3px 0px #222; margin-bottom: 25px; padding: 5px;">
        <h1>CARA MENJADI MEMBER</h1>
        <div class="" style="text-align: justify; font-size: 15px; color: #000">
          <div class="" style="padding: 5px; margin: 5px;">
            @for ($i=1; $i <= 42; $i++)
              MENJADI MEMBER&nbsp;,
            @endfor
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
