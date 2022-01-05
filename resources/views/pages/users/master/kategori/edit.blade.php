@extends('templates.users.layout')

@section('contentUsers')
<div class="row align-items-center mt-4 justify-content-between">
  <div class="col-3">
    <h3 class="text-secondary">KATEGORI - <span class="fs-6 fw-light">Ubah Data</span></h3>
  </div>
  <div class="col-9 text-end">
    <a href="/user/kategori" class="btn btn-outline-primary">Kelola Kategori</a>
  </div>
</div>
<form class="mt-4" action="/user/edit_kategori/{{ $datakategori->id }}" method="post">
  @csrf
  <div class="mb-3">
    <div class="row">
      <div class="col-lg-6">
        <label for="nama" class="form-label">Nama</label>
        <input name="namakategori" type="text" class="form-control @error('namakategori') is-invalid @enderror" id="nama" value="{{ $datakategori->nama_kategori }}">
        @error('namakategori')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>
  </div>
  <div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="3">{{ $datakategori->deskripsi_kategori }}</textarea>
    @error('deskripsi')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="row">
    <div class="col-lg-4">
      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status_kategori" id="status" class="form-select" aria-label="Default select example">
          <option selected value="{{ $kategoriStatusAktif->id_kategori }}">Aktif</option>
          <option value="{{ $kategoriStatusNon->id_kategori }}">Tidak Aktif</option>
        </select>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-success">SIMPAN</button>
</form>
@endsection