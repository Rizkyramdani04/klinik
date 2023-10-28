@extends('dashboard.layouts.main')

@section('container')
    @if ($errors->any())
    @foreach ($errors->all() as $item)
        <div class="alert alert-danger" role="alert">
            {{ $item }}
        </div>
    @endforeach
    @endif

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Laporan Data Pasien</div>
        <br>
        <a href="/dashboard/cetak/cetakLaporan" class="btn btn-success">Cetak Laporan Excel</a>

            <br />
            <div class="datatable-top">
                <div class="datatable-dropdown">
                    <label for="datatable-selector">
                        <select id="datatable-selector" class="datatable-selector">
                            <option value="today">Hari Ini</option>
                            <option value="this-week">Minggu Ini</option>
                            <option value="this-month">Bulan Ini</option>
                        </select>
                        entries per page
                    </label>
                </div>
                <div class="datatable-search">
                    <input type="text" id="datatable-input" placeholder="Search..." title="Search within table">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="table_id">
                    <thead class="thead-dark">
                        <tr style="text-align: center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Lahir</th>
                        <th>NIK</th>
                        <th>Jenis Kelamin</th>
                        <th>Nomer Telepon</th>
                        <th>Layanan</th>
                        <th>Tanggal Kunjungan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rekams as $rekam)
                    <tr style="text-align: center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $rekam->nama }}</td>
                        <td>{{ $rekam->alamat }}</td>
                        <td>{{ $rekam->tanggal_lahir }}</td>
                        <td>{{ $rekam->nik }}</td>
                        <td>{{ $rekam->jenis_kelamin }}</td>
                        <td>{{ $rekam->telepon }}</td>
                        <td>{{ $rekam->layanan }}</td>
                        <td>{{ $rekam->tanggal_kunjungan }}</td>
                        </tr>
                     @endforeach
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
</div>
@endsection
