<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Models\Pasien;
use App\Models\Layanan;
use App\Models\Rekam;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahAntrianHariIni = Rekam::whereDate('tanggal_kunjungan', now()->toDateString())->count();
        $jumlahAntrianMingguIni = Rekam::whereBetween('tanggal_kunjungan', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $jumlahAntrianBulanIni = Rekam::whereMonth('tanggal_kunjungan', now()->month)->count();
        $totalAntrian = Rekam::all()->count();
        $pasiens = Pasien::all();

        return view('dashboard.index', [
            'jumlahAntrianHariIni' => $jumlahAntrianHariIni,
            'jumlahAntrianMingguIni' => $jumlahAntrianMingguIni,
            'jumlahAntrianBulanIni' => $jumlahAntrianBulanIni,
            'totalAntrian' => $totalAntrian,
            'pasiens' => $pasiens
        ]);

        // $pasiens = Pasien::all();
        // return view('dashboard.index', ['pasiens' => $pasiens]);
    }

    public function indexAntrian()
    {
        $pasiens = Pasien::where('created_by', auth()->user()->id)->get();// Mendapatkan data pasien dari database
        return view('dashboard.daftar.daftarPasien', ['pasiens' => $pasiens]);
    }

    public function indexPasienLama()
    {
        $rekams = Rekam::where('created_by', auth()->user()->id)->get();// Mendapatkan data pasien dari database
        return view('dashboard.daftar.pasienLama', ['rekams' => $rekams]);
    }

    public function cetakNomorAntrian($no_antrian)
    {
        $pdf = PDF::loadView('dashboard.cetak.cetakAntrian', ['no_antrian' => $no_antrian]);
        return $pdf->download('nomor_antrian.pdf');
    }

    public function cetakKartuMember($id, $nama, $tanggal_lahir) {
        // Di sini, Anda dapat mengambil data member berdasarkan parameter yang diberikan
        $rekam = Rekam::where('id', $id)
            ->where('nama', $nama)
            ->where('tanggal_lahir', $tanggal_lahir)
            ->first();

        if ($rekam) {
            // Di sini, Anda dapat menggunakan pustaka cetak PDF seperti Laravel PDF atau DomPDF
            // untuk mencetak kartu member. Pastikan Anda telah menginstal pustaka yang sesuai.

            // Contoh menggunakan Laravel PDF:
            $pdf = PDF::loadView('dashboard.cetak.member', ['rekam' => $rekam]);
            return $pdf->download('kartu_member.pdf');
        } else {
            // Member tidak ditemukan, Anda dapat mengambil tindakan yang sesuai, misalnya,
            // mengarahkan kembali ke halaman sebelumnya dengan pesan kesalahan.
            return redirect()->back()->with('error', 'Member tidak ditemukan.');
        }
    }


    // public function create()
    // {
    //     $layanans = Layanan::all();
    //     return view('dashboard.antrian.create', compact('layanans'));

    // }

    public function edit($id)
    {

        $rekam = Rekam::find($id);
        $layanans = Layanan::all(); // Ambil semua data layanan

        return view('dashboard.daftar.daftarPasienlama', compact('rekam', 'layanans'));
    }

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

        public function resetAntrian()
        {
            // Lakukan tindakan untuk mengosongkan data antrian, misalnya dengan menghapus data dari tabel antrian
            Pasien::truncate();

            // Setelah mengosongkan antrian, arahkan kembali admin ke halaman tampilan pasien
            return redirect('dashboard/pasien')->with('success', 'Antrian telah diupdate.');
        }


}
