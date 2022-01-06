@extends('templates.users.layout')

@section('contentUsers')
<div class="row align-items-center mt-4 mb-3 justify-content-between">
  <div class="col-3">
    <h3 class="text-secondary">DOMPET</h3>
  </div>
  <div class="col-9 text-end">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
      <a href="/user/add_dompet" class="btn btn-outline-primary">Buat baru</a>
      <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          Filter
        </button>
        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
          <li><a class="dropdown-item" href="#">Aktif</a></li>
          <li><a class="dropdown-item" href="#">Tidak Aktif</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
@if(session('sukses'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('sukses') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session('suksesUpdate'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('suksesUpdate') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card my-4">
  <div class="card-header">
    <i class="fas fa-table me-1"></i>
    DataTable DOMPET
  </div>
  <div class="card-body">
    <table id="datatablesSimple">
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama</th>
          <th>Referensi</th>
          <th>Deskripsi</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>No.</th>
          <th>Nama</th>
          <th>Referensi</th>
          <th>Deskripsi</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </tfoot>
      <tbody>
        @foreach($datadompet as $row)
        <tr>
          <td>{{ $nomor++ }}</td>
          <td>{{ $row->nama }}</td>
          <td>{{ $row->referensi }}</td>
          <td>{{ $row->deskripsi }}</td>
          <td>{{ $row->status_dompet }}</td>
          <td>
            <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom{{ $row->id }}" aria-controls="offcanvasBottom{{ $row->id }}"><i class="fas fa-sort-down"></i></button>

            <div class="offcanvas offcanvas-bottom text-center" tabindex="-1" id="offcanvasBottom{{ $row->id }}" aria-labelledby="offcanvasBottomLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasBottomLabel">{{ $row->nama }}</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <hr class="dropdown-divider">
              <div class="offcanvas-body small">
                <a class="btn btn-success mx-3" href="/user/detail_dompet/{{ $row->id }}"><i class="fas fa-search"></i> Detail</a>
                <a class="btn btn-secondary mx-3" href="/user/edit_dompet/{{ $row->id }}"><i class="fas fa-pen"></i> Ubah</a>
                @if($row->status_dompet === 'Aktif')
                <a class="btn btn-danger mx-3" href="/user/status_dompet/{{ $row->id }}/2"><i class="fas fa-times"></i> Tidak Aktif</a>
                @else
                <a class="btn btn-primary mx-3" href="/user/status_dompet/{{ $row->id }}/1"><i class="fas fa-check"></i> Aktif</a>
                @endif
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection