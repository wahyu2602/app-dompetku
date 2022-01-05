@extends('templates.users.layout')

@section('contentUsers')
<div class="row align-items-center mt-4 mb-3 justify-content-between">
  <div class="col-lg-5">
    <h3 class="text-secondary">DOMPET MASUK - <span class="fs-6 fw-light">Buat Baru</span></h3>
  </div>
  <div class="col-lg-7 text-end">
    <a href="/user/transaksi_masuk" class="btn btn-outline-primary">Kelola Dompet Masuk</a>
  </div>
</div>
@if(session('errornilai'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('errornilai') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<form class="mt-4" action="/user/add_dompet_masuk" method="post">
  @csrf
  <div class="mb-3">
    <div class="row">
      <div class="col-lg-3">
        <label for="kode" class="form-label">Kode</label>
        <input placeholder="{{ $kode }}" type="text" class="form-control" id="kode" disabled>
      </div>
      <div class="col-lg-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input name="tanggal" placeholder="{{ date('Y-m-d') }}" type="text" class="form-control" id="tanggal" disabled>
      </div>
      <div class="col-lg-3">
        <label for="kategori" class="form-label">Kategori</label>
        <select name="kategori" id="kategori" class="form-select" aria-label="Default select example">
          @foreach($datakategori as $row)
          <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-lg-3">
        <label for="dompet" class="form-label">Dompet</label>
        <select name="dompet" id="dompet" class="form-select" aria-label="Default select example">
          @foreach($datadompet as $row)
          <option value="{{ $row->id }}">{{ $row->nama }}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <div class="mb-3">
        <label for="nilai" class="form-label">Nilai</label>
        <input name="nilai" type="number" class="form-control @error('nilai') is-invalid @enderror" id="nilai">
        @error('nilai')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>
  </div>
  <div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
    @error('deskripsi')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-success">SIMPAN</button>
</form>
@endsection