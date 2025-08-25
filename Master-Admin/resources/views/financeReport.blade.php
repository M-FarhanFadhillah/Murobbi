@extends('layouts.tempNav')
@section('container')
<div class="row">
  <div class="col-6 .col-sm-4"><h3><i class="fa-solid fa-wallet"></i> Laporan Keuangan</h3></div>
  <div class="col">
    <form action="/financereport">
      <div class="input-group">
          <input type="text" class="form-control" placeholder="Cari Masjid..." name="search" value="{{ request('search') }}">
          <button class="btn btn-outline-secondary" type="submit">Cari</button>
      </div>
  </form>
  </div>
</div>
<hr>
<div class="row">
  @foreach ($list_masjid as $item)
  <div class="col-6 mt-3">
    <div class="card text-center">
      <div class="card-header">
        <h3><img src="{{ asset('storage/'.$item->masjid_pict) }}" class="rounded" width="500px" height="400px" alt="Masjid" style="object-fit: cover"></h3>
      </div>
      <div class="card-body">
        <h5 class="card-title">{{ $item->masjid_name }}</h5>
        <p class="card-text">{{ $item->alamat }}</p>
        <a href="/lapkeu/{{ $item->id }}/{{ $item->masjid_name }}" class="btn btn-outline-success">Laporan Keuangan <i class="fa-solid fa-chevron-right"></i></a>
        <a href="/ziswaf/{{ $item->id }}/{{ $item->masjid_name }}" class="btn btn-outline-info">Laporan ZISWAF <i class="fa-solid fa-chevron-right"></i></a>
      </div>
      <div class="card-footer text-body-secondary">
        Diperbarui 3 Hari yang lalu
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection