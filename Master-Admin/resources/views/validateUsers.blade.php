@extends('layouts.tempNav')
@section('container')
@if(session()->has('update'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('update') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session()->has('delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('delete') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="row">
    <div class="col"><h3><i class="fa-solid fa-address-card"></i> Validasi Pendaftaran</h3></div>
    <div class="col-3">
        <form action="/validateRegist">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Calon Pengguna..." name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </form>
    </div>
</div>
<hr>
<div class="container">
    <table class="table text-center">
        <thead>
            <th scope="col">ID Pendaftar</th>
            <th scope="col">Email</th>
            <th scope="col">Nama</th>
            <th scope="col">Aksi</th>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($user as $item)  
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                        <a href="/ActiveUser/{{ $item->id }}/{{ $item->name }}">
                            <button onclick="return confirm('Anda yakin ingin menvalidasi data ini?')" type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Konfirmasi Pendaftar"><i class="fa-solid fa-check"></i></button>
                        </a>
                        <a href="/RefuseUser/{{ $item->id }}/{{ $item->name }}">
                            <button onclick="return confirm('Anda yakin ingin menolak data ini?')" type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Tolak Pendaftar"><i class="fa-solid fa-x"></i></button>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> 
</div>
{{ $user->links() }} 
@endsection