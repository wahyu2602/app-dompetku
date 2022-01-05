@extends('templates.users.layout')

@section('contentUsers')
<div class="row align-items-center mt-4 mb-3 justify-content-between">
  <div class="col">
    <h3 class="text-secondary">DOMPET MASUK</h3>
  </div>
  <div class="col text-end">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
      <a href="/user/add_dompet_masuk" class="btn btn-outline-primary">Buat baru</a>
    </div>
  </div>
</div>
@if(session('sukses'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('sukses') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card my-4">
  <div class="card-header">
    <i class="fas fa-table me-1"></i>
    DataTable DOMPET MASUK
  </div>
  <div class="card-body">
    <table id="datatablesSimple">
      <thead>
        <tr>
          <th>No.</th>
          <th>Tanggal</th>
          <th>Kode</th>
          <th>Deskripsi</th>
          <th>Kategori</th>
          <th>Nilai</th>
          <th>Dompet</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>No.</th>
          <th>Tanggal</th>
          <th>Kode</th>
          <th>Deskripsi</th>
          <th>Kategori</th>
          <th>Nilai</th>
          <th>Dompet</th>
        </tr>
      </tfoot>
      <tbody>
        @foreach($dataTransaksi as $row)
        <tr>
          <td>{{ $nomor++ }}</td>
          <td>{{ $row->tanggal }}</td>
          <td>{{ $row->kode }}</td>
          <td>{{ $row->deskripsi_transaksi }}</td>
          <td>
            {{ $row->nama_kategori }}
          </td>
          <td>{{ $row->nilai }}</td>
          <td>{{ $row->nama }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection