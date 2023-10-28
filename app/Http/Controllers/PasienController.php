<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Layanan;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        $pasiens = Pasien::all(); // Mengambil data pasien dari database
        return view('dashboard.pasien.index', ['pasiens' => $pasiens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $layanans = Layanan::all();
        $dokters = Dokter::all();
        return view('dashboard.pasien.create', compact('layanans', 'dokters'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|string|unique:pasiens,nik',
            'jenis_kelamin' => 'required|string|in:laki-laki,perempuan',
            'telepon' => 'required|string|max:20',
            'layanan' => 'required|string|exists:layanans,nama',
           // 'dokter' => 'required|string|exists:dokters,nama',
        ]);

        // Mendapatkan nomor antrian terbaru
        $nomorAntrianTerbaru = Pasien::max('no_antrian');

        // Menghasilkan nomor antrian baru
        $nomorAntrianBaru = 'A ' . sprintf('%03d', intval(substr($nomorAntrianTerbaru, 2)) + 1);

        // Membuat dan menyimpan data pasien ke dalam database
        $pasien = new Pasien($validatedData);
        $pasien->no_antrian = $nomorAntrianBaru;
        $pasien->save();

        // Redirect atau lakukan tindakan lain yang sesuai
        return redirect('/dashboard/daftar')->with('success', 'Pasien berhasil ditambahkan dengan nomor antrian ' . $nomorAntrianBaru);
        }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        $layanans = Layanan::all();
        return view('dashboard.pasien.edit', [
            'pasien' => $pasien,
            'layanans' => $layanans
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|string|max:20',
            'jenis_kelamin' => 'required|string|in:laki-laki,perempuan',
            'telepon' => 'required|string|max:20',
            'layanan' => 'required|string',
           // 'dokter' => 'required|string',
        ]);

        $pasien = Pasien::find($id);

        $pasien->update($request->all());


        // Redirect atau lakukan tindakan lain yang sesuai
        return redirect('/dashboard/pasien')->with('success', 'Data pasien berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        // Hapus data pasien dari database
        $pasien->delete();

        // Redirect atau lakukan tindakan lain yang sesuai
        return redirect()->back()->with('success', 'Data pasien berhasil dihapus.');
    }
}
