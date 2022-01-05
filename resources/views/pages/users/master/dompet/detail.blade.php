@extends('templates.users.layout')

@section('contentUsers')
<div class="row mt-4">
  <div class="col-lg-6">
    <div class="card" style="width: 18rem;">
      <div class="card-header">
        {{ $detail->nama }}
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <h6 class="text-secondary">
            Referensi :
          </h6>
          <p>{{ $detail->referensi }}</p>
        </li>
        <li class="list-group-item">
          <h6 class="text-secondary">
            Deskripsi :
          </h6>
          <p>{{ $detail->deskripsi }}</p>
        </li>
        <li class="list-group-item">
          <h6 class="text-secondary">
            Status <span class="fw-light">Aktif / Tidak Aktif</span> :
          </h6>
          <p>{{ $detail->status_dompet }}</p>
        </li>
      </ul>
    </div>
  </div>
</div>
<a href="/user/dompet" class="btn btn-primary mt-5">Kembali</a>
@endsection