@extends('templates.users.layout')

@section('contentUsers')
<div class="my-4">
  <button class="btn btn-primary">Print</button>
  <a href="/user/laporan" class="btn btn-secondary">Kembali</a>
</div>
<div class="my-3 text-center">
  <h3 class="text-secondary">RIWAYAT TRANSAKSI</h3>
  <p>{{ $tgl_awal }} - {{ $tgl_akhir }}</p>
</div>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Kode</th>
        <th scope="col">Deksripsi</th>
        <th scope="col">Dompet</th>
        <th scope="col">Kategori</th>
        <th scope="col">Nilai</th>
      </tr>
    </thead>
    <tbody>
      @foreach($result_masuk as $row)
      <tr>
        <th scope="row">{{ $nomor++ }}</th>
        <td>{{ $row->tanggal }}</td>
        <td>{{ $row->kode }}</td>
        <td>{{ $row->deskripsi_transaksi }}</td>
        <td>{{ $row->nama }}</td>
        <td>{{ $row->nama_kategori }}</td>
        <td>{{ number_format($row->nilai, 0, ',','.') }}</td>
      </tr>
      @endforeach
      @foreach($result_keluar as $row)
      <tr>
        <th scope="row">{{ $nomor++ }}</th>
        <td>{{ $row->tanggal }}</td>
        <td>{{ $row->kode }}</td>
        <td>{{ $row->deskripsi_transaksi }}</td>
        <td>{{ $row->nama }}</td>
        <td>{{ $row->nama_kategori }}</td>
        <td>{{ number_format($row->nilai, 0, ',','.') }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection