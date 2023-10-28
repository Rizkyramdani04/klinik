<title>Daftarkan Pasien Baru</title>
@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <h1>Form Daftar Pasien Lama</h1>
        <br>
        <form method="POST" action="{{ route('daftar.store') }}">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama" placeholder="nama" required="required"
                        value="{{ old('nama', $rekam->nama) }}" oninvalid="this.setCustomValidity('nama tidak boleh kosong')" oninput="setCustomValidity('')">
                </div>
            </div>
           <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                        placeholder="alamat" value="{{ old('alamat', $rekam->alamat) }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            "alamat masih kosong
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Lahir</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"
                        placeholder="tanggal_lahir" value="{{ old('tanggal_lahir', $rekam->tanggal_lahir) }}">
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            "tanggal lahir masih kosong
                        </div>
                    @enderror
                </div>
            </div>

           <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nonik"
                        name="nik" placeholder="nik" value="{{ old('nik', $rekam->nik) }}">
                    @error('nik')
                        <div class="invalid-feedback">
                            "nomor induk masih kosong
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-2 pt-0">Jenis Kelamin</label>
                <div class="col-sm-5">
                    <select name="jenis_kelamin" value="{{ old('jenis_kelamin', $rekam->jenis_kelamin) }}" class="form-control @error('jenis_kelamin') is-invalid @enderror">

                        <option selected value="">pilih</option>
                        <option value="laki-laki" {{ old('jenis_kelamin', $rekam->jenis_kelamin) != 'laki-laki' ?: 'selected' }}>Laki-laki</option>
                        <option value="perempuan" {{ old('jenis_kelamin', $rekam->jenis_kelamin) != 'perempuan' ?: 'selected' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            "pilih jenis kelamin
                        </div>
                    @enderror
                </div>
            </div>
            <br>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Telepon</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="notelp"
                        name="telepon" placeholder="Nomer telepon (aktif)" value="{{ old('telepon', $rekam->telepon) }}">
                    @error('telepon')
                        <div class="invalid-feedback">
                            "nomer telepon masih kosong
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row mt-2">
                <label class="col-form-label col-sm-2 pt-0">Layanan</label>
                <div class="col-sm-5">
                    <select name="layanan" class="form-control" required oninvalid="this.setCustomValidity('Pilih layanan yang diinginkan')" oninput="setCustomValidity('')">
                        <option value="">Pilih layanan...</option>
                        @foreach($layanans as $row)
                            <option value="{{ $row->nama }}">{{ $row->nama }}</option>
                        @endforeach
                    </select>
                    @error('layanan')
                        <div class="invalid-feedback">
                            "pilih jenis layanan
                        </div>
                    @enderror
                </div>
            </div>

        <br>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
@endsection
