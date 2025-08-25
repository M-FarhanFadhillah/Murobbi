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
    <div class="col-6 .col-sm-4"><h3><i class="fa-solid fa-user-group"></i> Daftar Edukasi</h3></div>
    <div class="col text-end"><a href="#" data-bs-toggle="modal" data-bs-target="#addEdu"><button type="button" class="btn btn-outline-warning"><i class="fa-solid fa-plus"></i> Tambah Content</button></a></div>
</div>
<hr>
<div class="row">
    {{-- Menampilkan Buku --}}
    <div class="col">
        <table class="table text-center">
            <div class="row">
                <div class="col text-center"><h3>Buku</h3></div>
            </div>
            <thead>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Judul</th>
                <th scope="col">Kategori</th>
                <th scope="col">Aksi</th>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($buku as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>            
                    <td>{{ $item->id }}</td>            
                    <td>{{ $item->judul }}</td>            
                    <td>@switch($item->kategori)
                        @case(0)
                        Anak-Anak
                        @break
                        @case(1)
                        Dewasa
                        @break
                        @case(2)
                        Orang Tua   
                        @break
                        @endswitch</td>            
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#infoEdu-{{ $item->id }}"><button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Tampilkan Detail Informasi"><i class="fa-solid fa-info"></i></button></a>
                            <a href="/dellEdu/{{$item->id}}/{{$item->judul}}"><button onclick="return confirm('Anda yakin ingin menghapus data?')" type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Buku"><i class="fa-solid fa-trash"></i></button></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- Menampilkan Video --}}
    <div class="col">
        <table class="table text-center">
            <div class="row">
                <div class="col text-center"><h3>Video</h3></div>
            </div>
            <thead>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Judul</th>
                <th scope="col">Kategori</th>
                <th scope="col">Aksi</th>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($video as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>            
                    <td>{{ $item->id }}</td>            
                    <td>{{ $item->judul }}</td>            
                    <td>@switch($item->kategori)
                        @case(0)
                        Anak-Anak
                        @break
                        @case(1)
                        Dewasa
                        @break
                        @case(2)
                        Orang Tua   
                        @break
                        @endswitch</td> 
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#infoEduV-{{ $item->id }}"><button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Tampilkan Detail Informasi"><i class="fa-solid fa-info"></i></button></a>
                            <a href="/dellEdu/{{$item->id}}/{{$item->judul}}"><button onclick="return confirm('Anda yakin ingin menghapus data?')" type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Video"><i class="fa-solid fa-trash"></i></button></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- Modal Details Buku --}}
@foreach ($data as $item)
<div class="modal fade" id="infoEdu-{{ $item->id }}" tabindex="-1" aria-labelledby="infoEduLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="infoEduLabel">Detail Informasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="col text-center mt-2">
                <img src="{{ asset('storage/'.$item->content) }}" alt="Foto Profil" width="150">
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
                                    Anak-Anak
                                    @break
                                    @case(1)
                                    Dewasa
                                    @break
                                    @case(2)
                                    Orang Tua   
                                    @break
                                    @endswitch
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Content</th>
                                <td>{{ ($item->jenis_education_id === 1) ? 'Buku ' : 'Video' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach 
{{-- Modal Details Video --}}
@foreach ($data as $item)
<div class="modal fade" id="infoEduV-{{ $item->id }}" tabindex="-1" aria-labelledby="infoEduVLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="infoEduVLabel">Detail Informasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="col text-center">
                <video controls width="800px" src="{{ asset('storage/'.$item->content) }}">
                </video>                
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
                                    Anak-Anak
                                    @break
                                    @case(1)
                                    Dewasa
                                    @break
                                    @case(2)
                                    Orang Tua   
                                    @break
                                    @endswitch
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Content</th>
                                <td>{{ ($item->jenis_education_id === 1) ? 'Buku ' : 'Video' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach 
{{-- Modal Tambah Education --}}
<div class="modal fade" id="addEdu" tabindex="-1" aria-labelledby="addEduLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addEduLabel">Tambah Content Edukasi</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="addEdu" action="/edu" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-floating">
                    <input type="text" class="form-control" id="judul" name="judul" required>
                    <label class="form-label">Judul Konten</label>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Konten</label>
                    <select type="number" class="form-select" name="jenis_education_id" id="jenis_education_id" required>
                        <option value="1">Buku</option>
                        <option value="2">Video</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori Konten</label>
                    <select type="number" class="form-select" name="kategori" id="kategori" required>
                        <option value="0">Anak-Anak</option>
                        <option value="1">Dewasa</option>
                        <option value="2">Orang Tua</option>
                    </select>
                </div>
                  <div class="mb-3">
                    <label class="form-label">Deskripsi Konten</label>
                    <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                  </div>                  
                  <div class="mb-3">
                    <label for="content" class="form-label">Konten</label>
                    <input class="form-control @error('content') is-invalid @enderror" type="file" id="content" name="content" required>
                    @error('content')
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