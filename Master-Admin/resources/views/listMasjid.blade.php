@extends('layouts.tempNav')
@section('container')
@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session()->has('delate'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('delate') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<h3 class="mb-4"><i class="fa-solid fa-mosque"></i> Daftar Masjid</h3>
<div class="row">
    <div class="col">
        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#addMasjid"><i class="fa-solid fa-plus"></i> Tambah Masjid</button>
    </div>
    <div class="col-3">
        <form action="/listmasjid">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Masjid..." name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </form>
    </div>
</div>
<hr>
<div class="container">
    <table class="table text-center">
        <thead>
            <th scope="col">No</th>
            <th scope="col">ID</th>
            <th scope="col">Nama Masjid</th>
            <th scope="col">Aksi</th>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($listMasjid as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->masjid_name }}</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                        <a href="#"data-bs-toggle="modal" data-bs-target="#infoMasjid-{{ $item->id }}"><button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Tampilkan Detail Informasi"><i class="fa-solid fa-info"></i></button></a>
                        <a href="/delMasjid/{{ $item->id }}/{{ $item->masjid_name }}"><button onclick="return confirm('Anda yakin ingin menghapus data?')" type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Masjid"><i class="fa-solid fa-trash"></i></button></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> 
</div> 
{{ $listMasjid->links() }}
{{-- Modal Tambah Masjid --}}
<div class="modal fade" id="addMasjid" tabindex="-1" aria-labelledby="addMasjidLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addMasjidLabel">Daftarkan Masjid Baru</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="masjidRegist" action="/listmasjid" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-floating">
                    <input type="text" class="form-control @error('masjid_name') is-invalid @enderror" id="masjid_name" name="masjid_name" required value="{{ old('masjid_name') }}">
                    <label>Nama Masjid</label>
                  @error('masjid_name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="mb-3 form-floating">
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required value="{{ old('alamat') }}">
                    <label>Alamat</label>
                  @error('alamat')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="mb-3 form-floating">
                    <input type="text" class="form-control @error('ketua_masjid') is-invalid @enderror" id="ketua_masjid" name="ketua_masjid" required value="{{ old('ketua_masjid') }}">
                    <label>Ketua Masjid</label>
                  @error('ketua_masjid')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="mb-3 form-floating">
                    <input type="number" class="form-control @error('kapasitas') is-invalid @enderror" id="kapasitas" name="kapasitas" required value="{{ old('kapasitas') }}">
                    <label>Kapasitas Masjid</label>
                  @error('kapasitas')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="mb-3 form-floating">
                    <input type="number" class="form-control @error('saldo_awal') is-invalid @enderror" id="saldo_awal" name="saldo_awal" required value="{{ old('saldo_awal') }}">
                    <label>Saldo Saat ini</label>
                  @error('saldo_awal')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div>
                    <input class="form-control" type="hidden" name="kas" value ="{{ old('saldo_awal') }}" id="kas">
                </div>
                <div class="mb-3">
                    <label for="masjid_pict" class="form-label">Foto Cover Masjid</label>
                    <input class="form-control @error('masjid_pict') is-invalid @enderror" type="file" id="masjid_pict" name="masjid_pict" required>
                    @error('masjid_pict')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
      </div>
    </div>
</div>
{{-- Modal Details --}}
@foreach ($data as $item)
<div class="modal fade" id="infoMasjid-{{ $item->id }}" tabindex="-1" aria-labelledby="infoMasjidLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="infoMasjidLabel">Detail Informasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="col text-center">
                <img src="{{ asset('storage/'.$item->masjid_pict) }}" alt="Foto Profil" width="450" class="rounded m-2">
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">ID</th>
                                <td>: {{ $item->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Masjid</th>
                                <td>: {{ $item->masjid_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat Masjid</th>
                                <td>: {{ $item->alamat }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Ketua Masjid</th>
                                <td>: {{ $item->ketua_masjid }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kapasitas</th>
                                <td>: {{ $item->kapasitas }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<script>
    // Menangani perubahan pada input saldo_awal
    document.getElementById('saldo_awal').addEventListener('input', function() {
        document.getElementById('kas').value = this.value;
    });
</script> 
@endsection