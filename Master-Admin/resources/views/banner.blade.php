@extends('layouts.tempNav')
@section('container')
@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session()->has('update'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('update') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session()->has('delate'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('delate') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="row">
    <div class="col-6 .col-sm-4"><h3><i class="fa-solid fa-sign-hanging"></i> Banner</h3></div>
    <div class="col text-end"><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#addBanner"><i class="fa-solid fa-plus"></i> Tambah Banner</button></div>
</div>
<hr>
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table text-center">
                <h3>Banner Aktif</h3>
                <thead>
                    <th scope="col">No</th>
                    <th scope="col">ID</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Aksi</th>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($aktif as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#infoBanner-{{ $item->id }}"><button type="button" class="btn btn-outline-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Nonaktifkan Banner"><i class="fa-solid fa-x"></i></button></a>
                                <a href="/dellbanner/{{$item->id}}/{{$item->judul}}"><button onclick="return confirm('Anda yakin ingin menghapus data?')" type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Banner"><i class="fa-solid fa-trash"></i></button></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col">
            <table class="table text-center">
                <h3>Banner Non Aktif</h3>
                <thead>
                    <th scope="col">No</th>
                    <th scope="col">ID</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Aksi</th>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($non as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#infoBanner-{{ $item->id }}"><button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Aktifkan Banner"><i class="fa-solid fa-check"></i></button></a>
                                <a href="/dellbanner/{{$item->id}}/{{$item->judul}}"><button onclick="return confirm('Anda yakin ingin menghapus data?')" type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Banner"><i class="fa-solid fa-trash"></i></button></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> 
{{-- Modal Aktifkan/NonAktifkan Banner --}}
@foreach ($data as $item)
<div class="modal fade" id="infoBanner-{{ $item->id }}" tabindex="-1" aria-labelledby="infoBannerLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="infoBannerLabel">Detail Informasi</h1>&nbsp;
                @if($item->status === true)
                    <form class="d-flex justify-content-center" id="ActiveBanner" action="/NonActiveBanner/{{ $item->id }}/{{ $item->judul }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <input class="form-control" type="hidden" name="status" value =false id="status">
                        </div>
                        <button type="submit" class="btn btn-outline-warning">Nonaktifkan Banner</button>
                    </form>
                    @else
                    <form class="d-flex justify-content-center" id="ActiveBanner" action="/ActiveBanner/{{ $item->id }}/{{ $item->judul }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <input class="form-control" type="hidden" name="status" value =true id="status">
                        </div>
                        <button type="submit" class="btn btn-outline-success">Aktifkan Banner</button>
                    </form>                        
                    @endif
            </div>
            
            <div class="col text-center mt-2">
                <img src="{{ asset('storage/'.$item->cover) }}" alt="Foto Profil" width="250" class="rounded m-2">
            </div>
            <div class="col text-center">
                {{ $item->deskripsi }}
            </div>
            <div class="row">
                <div class="col">
                    <table class="table text-center">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">ID</th>
                                <td>{{ $item->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Judul</th>
                                <td>{{ $item->judul }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kategori</th>
                                <td>@switch($item->kategori)
                                    @case(0)
                                    Informatif
                                    @break
                                    @case(1)
                                    Promo
                                    @break
                                    @case(2)
                                    Kegiatan
                                    @break
                                    @endswitch
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Status</th>
                                <td>{{ ($item->status === true) ? 'Aktif ' : 'Nonaktif' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach 
{{-- Modal Tambah Banner --}}
<div class="modal fade" id="addBanner" tabindex="-1" aria-labelledby="addBannerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addBannerLabel">Tambah Banner</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="addBanner" action="/banner" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-floating">
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required value="{{ old('judul') }}">
                    <label class="form-label">Judul Banner</label>
                  @error('judul')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select type="number" class="form-select" name="kategori" id="kategori" required>
                        <option value="0">Informatif</option>
                        <option value="1">Promo</option>
                        <option value="2">Kegiatan</option>
                    </select>
                </div>
                  <div class="mb-3">
                      <label class="form-label">Deskripsi Banner</label>
                      <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" required value="{{ old('deskripsi') }}" rows="3"></textarea>
                    @error('deskripsi')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="cover" class="form-label">Cover</label>
                    <input class="form-control @error('cover') is-invalid @enderror" type="file" id="cover" name="cover" required>
                    @error('cover')
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
@endsection