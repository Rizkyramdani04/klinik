<title>Daftarkan Layanan Baru</title>
@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <h1>Layanan Baru</h1>
        <br>
        <form method="POST" action="{{ route('layanan.store') }}">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama" placeholder="nama" required="required"
                        value="{{ old('nama') }}" oninvalid="this.setCustomValidity('nama tidak boleh kosong')" oninput="setCustomValidity('')">
                </div>
            </div>
        <br>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    {{-- <a href="/dashboard/layanan" class="btn btn-warning">Kembali</a> --}}
                </div>
            </div>
        </form>
    </div>
</body>

</html>
@endsection
