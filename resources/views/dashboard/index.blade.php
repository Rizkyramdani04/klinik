@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
    <div class="card mt-1">
        <div class="card-body">
            <div class="card-title">Dahsboard</div>
            <div class="col-xxl col-xl-12">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
                    <div class="d-flex align-items-center">
                        <h2>APLIKASI PENDAFTARAN KLINIK PROBEAUTY</h2>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Antrian Hari Ini --}}
<div class="row">
    <div class="col-xxl col-md-3">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">Antrian Hari Ini</h5>

                <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bx bxs-user-plus"></i>
                </div>
                <div class="ps-3">
                    <h6>{{ $jumlahAntrianHariIni }}</h6>
                </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Antrian Minggu Ini --}}
    <div class="col-xxl col-md-3">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">Antrian Minggu Ini</h5>

                <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bx bx-user-circle"></i>
                </div>
                <div class="ps-3">
                    <h6>{{ $jumlahAntrianMingguIni }}</h6>
                </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Antrian Bulan Ini --}}
    <div class="col-xxl col-md-3">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">Antrian Bulan Ini</h5>

                <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bx bxs-user-voice"></i>
                </div>
                <div class="ps-3">
                    <h6>{{ $jumlahAntrianBulanIni }}</h6>
                </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Semua Antrian --}}
    <div class="col-xxl col-md-3">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">Semua Antrian</h5>

                <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bx bxs-group"></i>
                </div>
                <div class="ps-3">
                    <h6>{{ $totalAntrian }}</h6>
                </div>
                </div>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Daftar Antrian</div>
            <div class="table-responsive">
                <table class="table table-bordered" id="table_id">
                    <thead class="thead-dark">
                        <tr style="text-align: center">
                            <th>No Antrian</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Layanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pasiens as $pasien)
                        <tr style="text-align: center">
                            <td>{{ $pasien->no_antrian }}</td>
                            <td>{{ $pasien->nama }}</td>
                            <td>{{ $pasien->jenis_kelamin }}</td>
                            <td>{{ $pasien->layanan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
