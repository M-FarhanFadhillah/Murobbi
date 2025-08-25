@extends('layouts.tempNav')
@section('container')
<div class="row">
  <div class="col-6 .col-sm-4"><h3><i class="fa-solid fa-users-rays"></i> Daftar Kegiatan</h3></div>
  <div class="col">
    <form action="/activity">
      <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari Masjid..." name="search" value="{{ request('search') }}">
          <button class="btn btn-outline-secondary" type="submit">Cari</button>
      </div>
  </form>
  </div>
</div>
<hr>
<div class="row">
  @foreach ($list_masjid as $item)
  <div class="col-4 mt-3">
    <div class="card text-center">
      <div class="card-header">
        <h3><img src="{{ asset('storage/'.$item->masjid_pict) }}" class="rounded" width="300px" height="200px" alt="Masjid" style="object-fit: cover"></h3>
      </div>
      <div class="card-body">
        <h5 class="card-title">{{ $item->masjid_name }}</h5>
        <p class="card-text">{{ $item->alamat }}</p>
        <a href="/activity/{{ $item->id }}/{{ $item->masjid_name }}" class="btn btn-outline-success">Kegiatan <i class="fa-solid fa-right-long fa-fade"></i></a>
      </div>
      <div class="card-footer text-body-secondary">
        {{ $item->activity->count() }} Kegiatan Aktif
      </div>
    </div>
  </div>
  @endforeach
</div>
{{ $list_masjid->links() }}
@endsection