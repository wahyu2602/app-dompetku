@extends('templates.users.layout')

@section('contentUsers')
<div class="row align-items-center mt-4 justify-content-between">
  <div class="col-lg-5">
    <h3 class="text-secondary">LAPORAN - <span class="fs-6 fw-light">Transaksi</span></h3>
  </div>
</div>
<form class="mt-4" action="/user/result" method="post">
  <h5 class="text-secondary mb-3">TRANSAKSI</h5>
  <div class="mb-3">
    <div class="row">
      <div class="col-lg-4">
        <label for="referensi" class="form-label">Tanggal Awal</label>
        <div class="input-group flex-nowrap">
          <span class="input-group-text" id="addon-wrapping"><i class="far fa-calendar-alt"></i></span>
          <input name="tanggalawal" type="date" class="form-control" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
      </div>
      <div class="col-lg-4">
        <label for="referensi" class="form-label">Tanggal Akhir</label>
        <div class="input-group flex-nowrap">
          <span class="input-group-text" id="addon-wrapping"><i class="far fa-calendar-alt"></i></span>
          <input name="tanggalakhir" type="date" class="form-control" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
      </div>
      <div class="col-lg-4">
        <label for="referensi" class="form-label">Status</label>
        <div class="form-check">
          <input name="transaksi_masuk" class="form-check-input" type="checkbox" value="{{ $transaksimasuk->status_transaksi }}" id="flexCheckChecked1" checked>
          <label class="form-check-label" for="flexCheckChecked1">
            Tampilkan Uang Masuk
          </label>
        </div>
        <div class="form-check">
          <input name="transaksi_keluar" class="form-check-input" type="checkbox" value="{{ $transaksikeluar->status_transaksi }}" id="flexCheckChecked2" checked>
          <label class="form-check-label" for="flexCheckChecked2">
            Tampilkan Uang Keluar
          </label>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4">
      <div class="mb-3">
        <label for="status" class="form-label">Kategori</label>
        <select name="kategori" id="status" class="form-select" aria-label="Default select example">
          @foreach($datakategori as $row)
          <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="mb-3">
        <label for="status" class="form-label">Dompet</label>
        <select name="dompet" id="status" class="form-select" aria-label="Default select example">
          @foreach($datadompet as $row)
          <option value="{{ $row->id }}">{{ $row->nama }}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-success">Buat Laporan</button>
  <button class="btn btn-success">Buat ke Excel</button>
</form>
@endsection