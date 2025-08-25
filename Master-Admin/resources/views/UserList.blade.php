@extends('layouts.tempNav')
@section('container')
    {{-- <h1>{{ $user[$data]->id }}</h1> --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('update'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('update') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('delate'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('delate') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h3 class="mb-4"><i class="fa-solid fa-user-group"></i> Daftar Pengguna</h3>
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#addUser"><i
                    class="fa-solid fa-plus"></i> Tambah Pengguna</button>
        </div>
        <div class="col-3">
            <form action="/listUser">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Pengguna..." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="container">
        <table class="table text-center">
            <thead>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Aksi</th>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($user as $item)
                    {{-- $item->id --}}
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                <a href="" data-bs-toggle="modal" data-bs-target="#infoAccount-{{ $item->id }}">
                                    <button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Tampilkan Detail Informasi">
                                        <i class="fa-solid fa-info"></i>
                                    </button>
                                </a>
                                <a href="" data-bs-toggle="modal"
                                    data-bs-target="#infoSholat-{{ $item->id }}"><button type="button"
                                        class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-custom-class="custom-tooltip" data-bs-title="Tampilkan Absensi Sholat"><i
                                            class="fa-solid fa-list-check"></i></button></a>
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#updatePass-{{ $item->id }}"><button type="button"
                                        class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-custom-class="custom-tooltip" data-bs-title="Reset Paswword"><i
                                            class="fa-solid fa-rotate-right"></i></button></a>
                                <a href="/delate/{{ $item->id }}/{{ $item->name }}"><button
                                        onclick="return confirm('Anda yakin ingin menghapus data?')" type="button"
                                        class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Pengguna"><i
                                            class="fa-solid fa-trash"></i></button></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $user->links() }}
    {{-- Modal Update Password --}}
    @foreach ($data as $item)
        <div class="modal fade" id="updatePass-{{ $item->id }}" tabindex="-1" aria-labelledby="infoAccountLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="infoAccountLabel">Update Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ asset('storage/' . $item->profil_pict) }}" alt="Foto Profil" width="150">
                            </div>
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
                                            <th scope="row">Nama</th>
                                            <td>{{ $item->name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>{{ $item->email }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">No HP</th>
                                            <td>{{ $item->no_hp }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <form id="updatePass" action="/updatePass/{{ $item->id }}/{{ $item->name }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 form-floating">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            name="password" required>
                                        <label class="form-label">Update Password</label>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Modal Tambah Pengguna --}}
    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addUserLabel">Daftarkan Pengguna Baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="userRegist" action="/listUser" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 form-floating">
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" id="email" required
                                value="{{ old('email') }}">
                            <label class="form-label">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" required value="{{ old('name') }}">
                            <label class="form-label">Nama</label>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="tel" class="form-control @error('no_hp') is-invalid @enderror"
                                id="no_hp" name="no_hp" required value="{{ old('no_hp') }}">
                            <label class="form-label">No. HP</label>
                            @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <input class="form-control" type="hidden" name="status" value=1 id="status">
                        </div>
                        <div class="mb-3">
                            <label for="profil_pict" class="form-label">Foto Profil</label>
                            <input class="form-control @error('profil_pict') is-invalid @enderror" type="file"
                                id="profil_pict" name="profil_pict" required>
                            @error('profil_pict')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" required>
                            <label class="form-label">Password</label>
                            @error('password')
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
    {{-- Modal Absensi Sholat --}}
    @foreach ($data as $item)
        <div class="modal fade" id="infoSholat-{{ $item->id }}" tabindex="-1" aria-labelledby="infoSholatLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="infoSholatLabel">Absensi Sholat {{ $item->name }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Subuh</th>
                                    <th scope="col">Dzuhur</th>
                                    <th scope="col">Ashar</th>
                                    <th scope="col">Mahgrib</th>
                                    <th scope="col">Isya</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Masjid</td>
                                    <td>Masjid</td>
                                    <td>Masjid</td>
                                    <td>Masjid</td>
                                    <td>Masjid</td>
                                </tr>
                                <tr>
                                    <td>Berjamaah</td>
                                    <td>Berjamaah</td>
                                    <td>Berjamaah</td>
                                    <td>Berjamaah</td>
                                    <td>Berjamaah</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endforeach
    {{-- Modal Details Info --}}
    @foreach ($data as $item)
        <div class="modal fade" id="infoAccount-{{ $item->id }}" tabindex="-1" aria-labelledby="infoAccountLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="infoAccountLabel">Detail Pengguna</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ asset('storage/' . $item->profil_pict) }}" alt="Foto Profil" width="150">
                            </div>
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
                                            <th scope="row">Nama</th>
                                            <td>{{ $item->name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>{{ $item->email }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">No HP</th>
                                            <td>{{ $item->no_hp }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
