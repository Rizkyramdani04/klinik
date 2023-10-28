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
                <div class="card-title">Data Dokter</div>

        <a href="/dashboard/dokter/create" type="button" class="btn btn-success">
            <i class="fas fa-plus text-white"></i> <i class="fas fa-address-book text-white"></i> Tambah Dokter Baru</a>

            <br />
            <div class="table-responsive mt-2">
                <table class="table table-bordered" id="table_id">
                    <thead class="thead-dark">
                        <tr style="text-align: center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomer Telepon</th>
                        <th>Jadwal</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dokters as $dokter)
                    <tr style="text-align: center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dokter->nama }}</td>
                        <td>{{ $dokter->alamat }}</td>
                        <td>{{ $dokter->telepon }}</td>
                        <td>{{ $dokter->jadwal }}</td>
                        <td>{{ $dokter->status }}</td>
                        <td>
                            <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                            <form action="/dashboard/dokter/{{ $dokter->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger border-0" onclick="return confirm('Kamu Yakin?')">
                                    <i class="bi bi-x-lg"></i></span></button>
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
