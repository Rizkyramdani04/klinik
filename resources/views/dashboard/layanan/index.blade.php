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
                <div class="card-title">Daftar Layanan</div>

        <a href="/dashboard/layanan/create" type="button" class="btn btn-success">
            <i class="fas fa-plus text-white"></i> <i class="fas fa-address-book text-white"></i>  Tambah Layanan Baru</a>

            <div class="table-responsive mt-2">
                <table class="table table-bordered" id="table_id">
                    <thead class="thead-dark">
                        <tr style="text-align: center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($layanans as $layanan)
                    <tr style="text-align: center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $layanan->nama }}</td>
                        <td>
                            <a href="{{ route('layanan.edit', $layanan->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                            <form action="/dashboard/layanan/{{ $layanan->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Kamu Yakin?')">
                                    <i class="bi bi-x-lg"></i></button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
