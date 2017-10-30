@extends('frontend.layouts.v_master')

@section('title', $title)

@section('content')
  <div class="form-main">
    <div class="row">
      <div class="kol-md-12">
        <div class="mainpaket">
          <h3>PEMBAYARAN DISELESAIKAN SEBELUM {!! date('h:i',strtotime('+3 hours')) !!}</h3>
          <p>MOHON TRANSFER KE REKNING</p>
          <p>KODE BANK</p>
          <p>NO REKENING</p>
          <p>NAMA PEMILIK REKENING</p>
          <p>JUMLAH TOTAL</p>
          <p>JIKA SUDAH MEMBAYAR MAKA STATUS PEMBAYARAN BERUBAHDI AKUN USER JIKA BELUM TERVERIFIKASI SILAHKAN UPLOAD BUKTI PEMBAYARAN ATAU MENGHUBUNGI NOMOR INI</p>
        </div>
      </div>
    </div>
  </div>
@endsection
