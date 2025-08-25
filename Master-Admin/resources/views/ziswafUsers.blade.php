@extends('layouts.tempNav')
@section('container')
<div class="row">
    <div class="col-6 .col-sm-4"><h3><i class="fa-solid fa-circle-dollar-to-slot"></i> ZISWAF</h3></div>
</div>
<hr>
<div class="container">
    <table class="table text-center">
        <thead>
            <th scope="col">ID Transanksi</th>
            <th scope="col">Nama</th>
            <th scope="col">Tertuju</th>
            <th scope="col">Kategori</th>
            <th scope="col">Nominal</th>
            <th scope="col">Aksi</th>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <td>INF202310035717</td>
                <td>Syahril Fajri Pratama</td>
                <td>Masjid A</td>
                <td>Infaq</td>
                <td>Rp 4.000.000</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                        <a href="#"><button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Tampilkan Detail Informasi"><i class="fa-solid fa-list"></i></button></a>
                        <a href="#"><button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Cetak Laporan"><i class="fa-solid fa-file-pdf"></i></button></a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table> 
</div> 
@endsection