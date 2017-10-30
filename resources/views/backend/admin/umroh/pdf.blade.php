<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
  </head>
  <body>
    <h2 style="text-align: center; font-size: 15px">SAKO HOLIDAYS</h2>
    <table>
      <tbody>
        <tr>
          <td>Judul</td>
          <td>{!! $umroh->judul !!}</td>
        </tr>
        <tr>
          <td>Author</td>
          <td>{{ $umroh->author}}</td>
        </tr>
        <tr>
          <td>Dibuat Tanggal</td>
          <td>{{ $umroh->created_at }}</td>
        </tr>
        <tr>
          <td>Durasi Perjalanan</td>
          <td>{{ $umroh->durasi }}</td>
        </tr>
        <tr>
          <td>Awal Periode</td>
          <td>{{ $umroh->awalperiode }}</td>
        </tr>
        <tr>
          <td>Akhir Periode</td>
          <td>{{ $umroh->akhirperiode }}</td>
        </tr>
        <tr>
          <td>Harga</td>
          <td>{{ $umroh->harga }}</td>
        </tr>
        <tr>
          <td>Itinerary</td>
          <td>{!! $umroh->itinerary !!}</td>
        </tr>
        <tr>
          <td>Syarat & Ketentuan</td>
          <td>{!! $umroh->syarat !!}</td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
