<title>Daftarkan Pasien Baru</title>
@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <h1>Edit Data Dokter</h1>
        <br>
        <form method="POST" action="{{ route('dokter.update', $dokter->id) }}">
            @method('PUT')
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama" placeholder="nama" required="required"
                        value="{{ old('nama', $dokter->nama) }}" oninvalid="this.setCustomValidity('nama tidak boleh kosong')" oninput="setCustomValidity('')">
                </div>
            </div>
           <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                        placeholder="alamat" value="{{ old('alamat', $dokter->alamat) }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            "alamat masih kosong
                        </div>
                    @enderror
                </div>
            </div>
            <br>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Telepon</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="notelp"
                        name="telepon" placeholder="Nomer telepon (aktif)" value="{{ old('telepon', $dokter->telepon) }}">
                    @error('telepon')
                        <div class="invalid-feedback">
                            "nomer telepon masih kosong
                        </div>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label class="col-form-label col-sm-2 pt-0">Jadwal Praktik</label>
                <div class="col-sm-5">
                    <select name="jadwal" value="{{ old('jadwal', $dokter->jadwal) }}" class="form-control @error('jadwal') is-invalid @enderror">

                        <option selected value="">pilih</option>
                        <option value="08.00 - 15.00" {{ old('jadwal', $dokter->jadwal) != '08.00 - 15.00' ?: 'selected' }}>08.00 - 15.00</option>
                        <option value="09.00 - 16.00" {{ old('jadwal', $dokter->jadwal) != '09.00 - 16.00' ?: 'selected' }}>09.00 - 16.00</option>
                        <option value="10.00 - 17.00" {{ old('jadwal', $dokter->jadwal) != '10.00 - 17.00' ?: 'selected' }}>10.00 - 17.00</option>
                    </select>
                    @error('jadwal')
                        <div class="invalid-feedback">
                            "pilih jenis jadwal
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-2 pt-0">Status Dokter</label>
                <div class="col-sm-5">
                    <select name="status" value="{{ old('status', $dokter->status) }}" class="form-control @error('status') is-invalid @enderror">

                        <option selected value="">pilih</option>
                        <option value="Ada" {{ old('status', $dokter->status) != 'ada' ?: 'selected' }}>ada</option>
                        <option value="Tidak Ada" {{ old('status', $dokter->status) != 'tidak ada' ?: 'selected' }}>tidak ada</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">
                            "pilih jenis status
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
@endsection
