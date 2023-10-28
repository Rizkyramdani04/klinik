<?php

namespace App\Http\Controllers;

use App\Models\Rekam;
use App\Models\Pasien;
use Illuminate\Http\Request;

class RekamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|string|max:20',
            'jenis_kelamin' => 'required|string|in:laki-laki,perempuan',
            'telepon' => 'required|string|max:20',
            'layanan' => 'required|exists:layanan,id',
        ]);

       // Dapatkan informasi user yang saat ini terautentikasi
        $createdBy = Auth::id();

        // Tambahkan tanggal kunjungan ke dalam array
        $validatedData['tanggal_kunjungan'] = now(); // Gunakan waktu saat ini

        // Simpan data rekam beserta 'created_by', 'dokter', dan 'tanggal_kunjungan'
        $validatedData['created_by'] = $createdBy; // Gantilah ini sesuai dengan informasi yang ingin Anda simpan

        Rekam::create($validatedData);

        // $nomorAntrian = 1;
        // $cekData = Rekam::whereDate('created_at', Carbon::today())->latest()->first();
        // if ($cekData) {
        //     $nomorAntrian = $cekData->nomorantrian + 1;
        // }

        // $Rekam = Rekam::create([
        //     'nomorantrian' => "00" . $nomorAntrian,
        //     'id_pasien' => $validate['id_player'],
        //     'layanan' => $validate['layanan'],
        //     'keluhan' => $validate['keluhan'],
        //     'id_dokter' => $validate['dokter']
        // ]);

        // $latestrekam = Rekam::all()->last();
        // $pasienid = $latestrekam->id_pasien;
        // $pasientable = Pasien::where('id', $pasienid)->get();

        // foreach ($pasientable as $row):

        //     return redirect('pasien-lama')->with([
        //         'addsuccess' => 'Data berhasil ditambahkan',
        //         'nomorAntrian' => "00" . $nomorAntrian,
        //         'nama' => $row->nama,
        //         'timestamps' => $Rekam->created_at->format('H:i:s'),
        //         'tanggaldaftar' => $Rekam->created_at->format('d-m-Y')
        //     ]);

        // endforeach;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rekam  $rekam
     * @return \Illuminate\Http\Response
     */
    public function show(Rekam $rekam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rekam  $rekam
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekam $rekam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rekam  $rekam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rekam $rekam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rekam  $rekam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekam $rekam)
    {
        //
    }

    /**
     * Transfer data dari tabel "pasien" ke "rekam".
     *
     * @return \Illuminate\Http\Response
     */
    public function transferData()
    {
        // Ambil data dari tabel "pasien"
        $dataPasien = Pasien::all();

        // Loop melalui data pasien dan simpan ke tabel "rekam"
        foreach ($dataPasien as $pasien) {
            Rekam::create([
                'nama' => $pasien->nama,
                'alamat' => $pasien->alamat,
                'lahir' => $pasien->lahir,
                'nIK' => $pasien->nik,
                'kelamin' => $pasien->kelamin,
                'telepon' => $pasien->telepon,
                'layanan' => $pasien->layanan,
                'dokter' => $pasien->dokter,
            ]);
        }

        return "Data telah berhasil ditransfer dari tabel 'pasien' ke 'rekam'.";
    }
}
