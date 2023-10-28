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
                <div class="card-title">Daftar Pasien</div>

        <a href="/dashboard/pasien/create" type="button" class="btn btn-success">
            <i class="fas fa-plus text-white"></i> <i class="fas fa-address-book text-white"></i>Daftar Baru</a>

            {{-- <a href="/dashboard/pasien/create" type="button" class="btn btn-success">
                <i class="fas fa-plus text-white"></i> <i class="fas fa-address-book text-white"></i>Daftar Lama</a> --}}

            {{-- <div class="datatable-search mt-2">
                <input type="text" id="datatable-input" placeholder="Search..." title="Search within table">
            </div> --}}
            <br>

            <div class="table-responsive mt-2">
                <table class="table table-bordered" id="table_id">
                    <thead class="thead-dark">
                        <tr style="text-align: center">
                            <th>No</th>
                            <th>No Antrian</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Layanan</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pasiens as $pasien)
                        <tr style="text-align: center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pasien->no_antrian }}</td>
                            <td>{{ $pasien->nama }}</td>
                            <td>{{ $pasien->jenis_kelamin }}</td>
                            <td>{{ $pasien->layanan }}</td>
                            {{-- <td>
                                <a href="{{ route('daftar.edit', $pasien->id) }}" class="btn btn-success mt-1">Pasien Lama</i></a>
                                <a href="{{ route('cetak.member', ['id' => $pasien->id, 'nama' => $pasien->nama, 'tanggal_lahir' => $pasien->tanggal_lahir]) }}" class="btn btn-warning mt-1">Cetak</i></a>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>

@endsection

