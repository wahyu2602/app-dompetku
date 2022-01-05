@extends('templates.users.layout')

@section('contentUsers')
<div class="row align-items-center mt-4 justify-content-between">
  <div class="col-3">
    <h3 class="text-secondary">DOMPET - <span class="fs-6 fw-light">Buat Baru</span></h3>
  </div>
  <div class="col-9 text-end">
    <a href="/user/dompet" class="btn btn-outline-primary">Kelola Dompet</a>
  </div>
</div>
@if(session('sukses'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('sukses') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<form class="mt-4" action="/user/add_dompet" method="post">
  @csrf
  <div class="mb-3">
    <div class="row">
      <div class="col-lg-6">
        <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
        <input name="namadompet" type="text" class="form-control  @error('namadompet') is-invalid @enderror" id="nama" value="{{ old('namadompet') }}">
        @error('namadompet')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="col-lg-6">
        <label for="referensi" class="form-label">Referensi</label>
        <input name="referensi" type="text" class="form-control @error('referensi') is-invalid @enderror" id="referensi" value="{{ old('referensi') }}">
        @error('referensi')
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
  <div class="row">
    <div class="col-lg-4">
      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status_dompet" id="status" class="form-select" aria-label="Default select example">
          <option selected value="{{ $dompetStatusAktif->id_dompet }}">Aktif</option>
          <option value="{{ $dompetStatusNon->id_dompet }">Tidak Aktif</option>
        </select>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-success">SIMPAN</button>
</form>
@endsection