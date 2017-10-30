<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
  </head>
  <style type="text/css">
    * { font-family: Arial,sans-serif; font-style: normal; color: #000; line-height: 1.2em; }
  </style>
  <body onload="window.print();">
    <h2 style="text-align: center; font-size: 15px">PEMESAN SAKO HOLIDAYS</h2>
    <table border="1">
      <tbody>
        <tr>
          <td>Nama</td>
          <td>{{ $Ptour->name }}</td>
        </tr>
        <tr>
          <td>Email</td>
          <td>{{ $Ptour->email }}</td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td>{{ $Ptour->telephone }}</td>
        </tr>
        <tr>
          <td>Paket Tour</td>
          <td>{{ $Ptour->package }}</td>
        </tr>
        <tr>
          <td>Harga</td>
          <td>Rp. {{ $Ptour->price }}</td>
        </tr>
        <tr>
          <td>Tanggal Tour</td>
          <td>{!! date('d-F-Y',strtotime($Ptour->departure_date)) !!}</td>
        </tr>
        <tr>
          <td>Jumlah Peserta</td>
          <td>{{ $Ptour->participant }}</td>
        </tr>
        <tr>
          <td>Total Harga</td>
          <td>{{ $jumlah }}</td>
        </tr>
        <tr>
          <td>Catatan</td>
          <td>{{ $Ptour->note }}</td>
        </tr>
      </tbody>
    </table>
    <p>DIBUAT TANGGAL : {{ $Ptour->created_at }}</p>
  </body>
</html>
