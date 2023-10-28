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
                <div class="card-title">Data Pasien</div>
        <br>

        {{-- <a href="/dashboard/pasien/create" type="button" class="btn btn-success">
            <i class="fas fa-plus text-white"></i> <i class="fas fa-address-book text-white"></i>  Tambah Pasien Baru</a>
            <a href="/dashboard/pasien/create" type="button" class="btn btn-success">
                <i class="fas fa-plus text-white"></i> <i class="fas fa-address-book text-white"></i>  Tambah Pasien Lama</a> --}}
                <form action="{{ route('antrian.reset') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Anda yakin ingin mengosongkan antrian?')">Update Antrian</button>
                </form>
            <br />
            <div class="datatable-top">
                <div class="datatable-dropdown">
                    <label for="datatable-selector">
                        <select id="datatable-selector" class="datatable-selector">
                            <option value="all">Tampilkan Semua</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
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
                        <th>No Antrian</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>NIK</th>
                        <th>Jenis Kelamin</th>
                        <th>Nomer Telepon</th>
                        <th>Layanan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pasiens as $pasien)
                    <tr style="text-align: center">
                        <td>{{ $pasien->no_antrian }}</td>
                        <td>{{ $pasien->nama }}</td>
                        <td>{{ $pasien->alamat }}</td>
                        <td>{{ $pasien->tanggal_lahir }}</td>
                        <td>{{ $pasien->nik }}</td>
                        <td>{{ $pasien->jenis_kelamin }}</td>
                        <td>{{ $pasien->telepon }}</td>
                        <td>{{ $pasien->layanan }}</td>
                        <td>
                            <a href="{{ route('cetak.antrian', $pasien->no_antrian) }}" class="btn btn-success"><i class="bi bi-printer"></i></a>
                            <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning mt-1"><i class="bi bi-pencil"></i></a>
                            <form action="/dashboard/pasien/{{ $pasien->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger border-1 mt-1" onclick="return confirm('Kamu Yakin?')">
                                    <i class="bi bi-x-lg"></i></button>
                            </form>

                            </td>
                        </tr>
                     @endforeach
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
</div>
@endsection
