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
<div class="row">
    <div class="col">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary">
            <img src="{{ asset('storage/'.$data->masjid_pict) }}" class="d-block w-100 mt-1 rounded" alt="Masjid">
            <h3 class="text-center mt-1">Masjid {{ $data->masjid_name }}</h3>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                      <td>Kapasitas</td>
                      <td>: {{ $data->kapasitas }} Orang</td>
                    </tr>
                    <tr>
                      <td>Kas Masjid</td>
                      <td>: Rp {{ $data->kas }}</td>
                    </tr>
                    <tr>
                      <td>Ketua Masjid</td>
                      <td>: {{ $data->ketua_masjid }}</td>
                    </tr>
                  </tbody>
            </table>
            <hr>
            <p class="text-center">{{ $data->alamat }}</p>
        </div>
    </div>
    <div class="col" style="overflow: auto">
        @if ($kegiatan !== null)
            <table class="table text-center">
                <div class="row">
                    <div class="col-sm-6 .col-sm-8"><h3>Kegiatan Masjid</h3></div>
                    <div class="col text-end"><button data-bs-toggle="modal" data-bs-target="#addAct" type="button" class="btn btn-outline-warning"><i class="fa-solid fa-users-rays"></i> Tambah Kegiatan</button></div>
                </div>
                <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Kegiatan</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Aksi</th>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($kegiatan as $item)
                    <tr>
                        <td>{{ $item->id }}</td>            
                        <td>{{ $item->activity_name }}</td>            
                        <td>
                            @switch($item->categories)
                            @case(0)
                            Kegiatan Kecil
                            @break
                            @case(1)
                            Kegiatan Sedang
                            @break
                            @case(2)
                            Kegiatan Besar
                            @break
                            @endswitch                        
                        </td>            
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#infoAct-{{ $item->id }}"><button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Tampilkan Detail Informasi"><i class="fa-solid fa-info"></i></button></a>
                                <a href="/delAct/{{$item->id}}/{{$item->activity_name}}"><button onclick="return confirm('Anda yakin ingin menghapus data?')" type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Kegiatan"><i class="fa-solid fa-trash"></i></button></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h2 class="mt-5 text-center">Data Tidak Ditemukan</h2>    
            @endif
    </div>
</div>
@foreach ($data_kegiatan as $item)
<div class="modal fade" id="infoAct-{{ $item->id }}" tabindex="-1" aria-labelledby="infoActLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="infoActLabel">Detail Informasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="col text-center mt-2">
                <img src="{{ asset('storage/'.$item->pict) }}" alt="Foto Profil" width="150">
            </div>
            <div class="col text-center">
                {{ $item->decription }}
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">ID</th>
                                <td>{{ $item->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Kegiatan</th>
                                <td>{{ $item->activity_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kategori</th>
                                <td>@switch($item->categories)
                                    @case(0)
                                    Kegiatan Kecil
                                    @break
                                    @case(1)
                                    Kegiatan Sedang
                                    @break
                                    @case(2)
                                    Kegiatan Besar   
                                    @break
                                    @endswitch
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
{{ $kegiatan->links() }} 

{{-- Modal Tambah Kegiatan --}}
@foreach ($data_kegiatan as $item)
    <div class="modal fade" id="addAct" tabindex="-1" aria-labelledby="addActLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="addActLabel">Tambah Kegiatan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addActivity" action="/activity/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 form-floating">
                        <input type="text" required class="form-control" id="activity_name" name="activity_name">
                        <label class="form-label">Nama Kegiatan</label>
                    </div>
                    <div>
                    <input class="form-control" type="hidden" required name="masjid_id" id="masjid_id" value="{{ $data->id }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Kegiatan</label>
                        <textarea type="text" class="form-control" id="decription" name="decription" required rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori Kegiatan</label>
                        <select type="number" class="form-select" name="categories" id="categories" required>
                            <option value="0">Kecil</option>
                            <option value="1">Sedang</option>
                            <option value="2">Besar</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pict" class="form-label">Cover Kegiatan</label>
                        <input class="form-control @error('pict') is-invalid @enderror" type="file" id="pict" name="pict" required>
                        @error('pict')
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
@endforeach
@endsection