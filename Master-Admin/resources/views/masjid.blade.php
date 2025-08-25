@extends('layouts.tempNav')
@section('container')
<h1 class="m-4 text-center">Masjid</h1>
<hr>
<div class="row">
  <div class="col">
    <div class="card text-center">
      <div class="card-header">
        <h3><i class="fa-solid fa-circle-plus"></i></h3>
      </div>
      <div class="card-body">
        <h5 class="card-title">Daftar Masjid</h5>
        <p class="card-text">Lihat masjid yang telah berkolaborasi dengan aplikasi.</p>
        <a href="/listmasjid" class="btn btn-outline-success">Selengkapnya <i class="fa-solid fa-right-long fa-fade"></i></a>
      </div>
      <div class="card-footer text-body-secondary">
        {{ $j_masjid }} Masjid telah bergabung
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card text-center">
      <div class="card-header">
        <h3><i class="fa-solid fa-sign-hanging"></i></h3>
      </div>
      <div class="card-body">
        <h5 class="card-title">Banner</h5>
        <p class="card-text">Tambahkan promosi yang ingin ditampilkan di aplikasi.</p>
        <a href="/banner" class="btn btn-outline-success">Selengkapnya <i class="fa-solid fa-right-long fa-fade"></i></a>
      </div>
      <div class="card-footer text-body-secondary">
        Saat ini {{ $j_banner }} Banner Aktif
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card text-center">
      <div class="card-header">
        <h3><i class="fa-solid fa-book"></i></h3>
      </div>
      <div class="card-body">
        <h5 class="card-title">Edukasi</h5>
        <p class="card-text">Siarkan pembelajaran muslim lebih luas di aplikasi.</p>
        <a href="/edu" class="btn btn-outline-success">Selengkapnya <i class="fa-solid fa-right-long fa-fade"></i></a>
      </div>
      <div class="card-footer text-body-secondary">
        {{ $j_edu }} Konten tersedia
      </div>
    </div>
  </div>
</div>
<div class="row mt-4">
  <div class="col">
    <div class="card text-center">
      <div class="card-header">
        <h3><i class="fa-solid fa-wallet"></i></h3>
      </div>
      <div class="card-body">
        <h5 class="card-title">Laporan Keuangan</h5>
        <p class="card-text">Informasikan laporan keuangan masjidmu di aplikasi.</p>
        <a href="/financereport" class="btn btn-outline-success">Selengkapnya <i class="fa-solid fa-right-long fa-fade"></i></a>
      </div>
      <div class="card-footer text-body-secondary">
        {{ $j_lapkeu->updated_at->diffForHumans() }} Last Updated
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card text-center">
      <div class="card-header">
        <h3><i class="fa-solid fa-users-rays"></i></h3>
      </div>
      <div class="card-body">
        <h5 class="card-title">Kegiatan</h5>
        <p class="card-text">Informasikan kegiatan terbaru masjidmu di aplikasi.</p>
        <a href="/activity" class="btn btn-outline-success">Selengkapnya <i class="fa-solid fa-right-long fa-fade"></i></a>
      </div>
      <div class="card-footer text-body-secondary">
        Saat ini 3 Kegiatan Aktif
      </div>
    </div>
  </div>
</div>
@endsection