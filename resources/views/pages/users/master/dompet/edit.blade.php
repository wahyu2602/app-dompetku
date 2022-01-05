@extends('templates.users.layout')

@section('contentUsers')
<div class="row align-items-center mt-4 justify-content-between">
  <div class="col-3">
    <h3 class="text-secondary">DOMPET - <span class="fs-6 fw-light">Ubah Data</span></h3>
  </div>
  <div class="col-9 text-end">
    <a href="/user/dompet" class="btn btn-outline-primary">Kelola Dompet</a>
  </div>
</div>
<form class="mt-4" action="/user/edit_dompet/{{ $datadompet->id }}" method="post">
  @csrf
  <div class="mb-3">
    <div class="row">
      <div class="col-lg-6">
        <label for="nama" class="form-label">Nama</label>
        <input name="namadompet" type="text" class="form-control @error('namadompet') is-invalid @enderror" id="nama" value="{{ $datadompet->nama }}">
        @error('namadompet')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="col-lg-6">
        <label for="referensi" class="form-label">Referensi</label>
        <input name="referensi" type="text" class="form-control" id="referensi" value="{{ $datadompet->referensi }}">
      </div>
    </div>
  </div>
  <div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="3">{{ $datadompet->deskripsi }}</textarea>
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
          <option value="{{ $dompetStatusNon->id_dompet }}">Tidak Aktif</option>
        </select>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-success">SIMPAN</button>
</form>
@endsection