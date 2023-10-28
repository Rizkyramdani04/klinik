<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokters = Dokter::all(); // Mengambil semua data dokter dari tabel
        return view('dashboard.dokter.index', ['dokters' => $dokters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.dokter.create');
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
        'telepon' => 'required|string|max:20',
        'jadwal' => 'required|string|max:255',
    ]);

    // Simpan data dokter ke database
    Dokter::create($validatedData);

    // Redirect kembali ke halaman sebelumnya dengan pesan sukses
    return redirect('dashboard/dokter')->with('success', 'Dokter berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function show(Dokter $dokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokter $dokter)
    {
        return view('dashboard.dokter.edit', [
            'dokter' => $dokter
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'jadwal' => 'required|string|max:255',
            'status' => 'required|in:Ada,Tidak Ada',
        ]);

        $dokter = Dokter::find($id);
        $dokter->update($validatedData);

        // Redirect atau lakukan tindakan lain yang sesuai
        return redirect('/dashboard/dokter')->with('success', 'Data dokter berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokter $dokter)
    {
        $dokter->delete();

        // Redirect atau lakukan tindakan lain yang sesuai
        return redirect()->back()->with('success', 'Data dokter berhasil dihapus.');
    }
}
