{{-- @dd($lapkeu) --}}
@extends('layouts.tempNav')
@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <h3><i class="fa-solid fa-wallet"></i> Laporan Keuangan Masjid {{ $data->masjid_name }}</h3>
        </div>
    </div>
    <hr>
    <div class="container mb-4">
        <form action="filter" class="d-flex align-items-center">
            <div class="col-auto mx-2">
                <select type="date" class="form-select" name="filter_awal">
                    <option value="2023-1-1">Januari</option>
                    <option value="2023-2-1">Februari</option>
                    <option value="2023-3-1">Maret</option>
                    <option value="2023-4-1">April</option>
                    <option value="2023-5-1">Mei</option>
                    <option value="2023-6-1">Juni</option>
                    <option value="2023-7-1">Juli</option>
                    <option value="2023-8-1">Agustus</option>
                    <option value="2023-9-1">September</option>
                    <option value="2023-10-1">Oktober</option>
                    <option value="2023-11-1">November</option>
                    <option value="2023-12-1">Desember</option>
                </select>
            </div>
            <div class="col-auto mx-2"><i class="fa-solid fa-arrow-right fa-beat-fade"></i></div>
            <div class="col-auto mx-2">
                <select type="date" class="form-select" name="filter_akhir">
                    <option value="2023-1-31">Januari</option>
                    <option value="2023-2-31">Februari</option>
                    <option value="2023-3-31">Maret</option>
                    <option value="2023-4-31">April</option>
                    <option value="2023-5-31">Mei</option>
                    <option value="2023-6-31">Juni</option>
                    <option value="2023-7-31">Juli</option>
                    <option value="2023-8-31">Agustus</option>
                    <option value="2023-9-31">September</option>
                    <option value="2023-10-31">Oktober</option>
                    <option value="2023-11-31">November</option>
                    <option value="2023-12-31">Desember</option>
                </select>
            </div>
            <div class="col-auto mx-2"><button type="submit" class="btn btn-outline-info" data-bs-toggle="tooltip"
                    data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Tampilkan"><i
                        class="fa-solid fa-chevron-right"></i></button></div>
            <div class="col-auto mx-2"><a href="/lapkeu/{{ $data->id }}/{{ $data->masjid_name }}"><button type="button"
                        class="btn btn-outline-warning" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip" data-bs-title="Tampilkan Ulang Semua"><i
                            class="fa-solid fa-arrows-rotate"></i></button></div></a>
            <div class="col-auto mx-2"><a href="/cetak/{{ $data->id }}/{{ $data->masjid_name }}" target="_blank"><button type="button" class="btn btn-outline-success"><i
                        class="fa-solid fa-download"></i> Download Laporan</button></a></div>
            <div class="col-auto"><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                    data-bs-target="#addCashflow"><i class="fa-solid fa-plus"></i> Tambah Pemasukan/Pengeluaran</button>
            </div>
        </form>
    </div>
    <div class="container">
        <table class="table text-center">
            <thead>
                <th scope="col">Tanggal</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Debit</th>
                <th scope="col">Kredit</th>
                <th scope="col">Saldo</th>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <td>{{ $data->created_at->format('d F Y') }}</td>
                    <td>Saldo Awal</td>
                    <td></td>
                    <td></td>
                    <td>{{ 'Rp ' . number_format($data->saldo_awal, 0, ',', '.') }}</td>
                </tr>
                    @php
                        $saldo = $data->saldo_awal;
                    @endphp
                @foreach ($lapkeu as $item)
                    <tr>
                        <td>{{ date('d F Y', strtotime($item->date)) }}</td>
                        <td>{{ $item->note }}</td>
                        <td>{{ $item->cashflow === 0 ? 'Rp ' . number_format($item->nominal, 0, ',', '.') : '' }}</td>
                        <td>{{ $item->cashflow === 1 ? 'Rp ' . number_format($item->nominal, 0, ',', '.') : '' }}</td>
                        <td>
                            @php
                                $result = $item->cashflow === 0 ? $saldo + $item->nominal : $saldo - $item->nominal;
                                $saldo = $result;
                            @endphp
                            {{ 'Rp ' . number_format($result, 0, ',', '.') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- Modal Tambah Cashflow --}}
    {{-- Updated --}}
    <div class="modal fade" id="addCashflow" tabindex="-1" aria-labelledby="addCashflowLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addCashflowLabel">Tambah Arus Kas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addCashflow" action="/lapkeu/{{ $data->id }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="InputMasjid" class="form-label">Lokasi Masjid</label>
                            <input class="form-control" type="text" placeholder="{{ $data->masjid_name }}" disabled>
                        </div>
                        <div>
                            <input class="form-control" type="hidden" required name="masjid_id" id="masjid_id"
                                value="{{ $data->id }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Arus Kas</label>
                            <select type="number" name="cashflow" id="cashflow" class="form-select">
                                <option value="0">Debit (Uang Masuk)</option>
                                <option value="1">Kredit (Uang Keluar)</option>
                            </select>
                        </div>
                        <div class="mb-3 form-floating">
                            <input name="note" id="note" type="text" class="form-control" required>
                            <label>Keterangan</label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input name="date" id="date" type="date" class="form-control" required>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="number" class="form-control" id="nominal" name="nominal" required>
                            <label>Nominal</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
