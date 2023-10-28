<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekam;
use App\Exports\LaporanExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index()
    {
        if (!auth()->check() || !auth()->user()->is_admin) {

            abort(403);

        }
        // $dataPasienHarian = Rekam::whereDate('tanggal_kunjungan', today())->get();

        // // Tampilkan data pasien dalam tampilan laporan (misalnya, dalam tabel HTML)
        // return view('dashboard.laporan.index', ['dataPasienHarian' => $dataPasienHarian]);
        $rekams = Rekam::all(); // Misalnya, mengambil semua data dari tabel "rekam"
        return view('dashboard.laporan.index', compact('rekams'));

    //     $selectedOption = $request->input('selectedOption', 'today'); // Mengambil opsi dari permintaan

    // // Lakukan filter data berdasarkan $selectedOption
    // $data = $this->filterData($selectedOption);

    // return view('dashboard.laporan.index', compact('data'));

    }

    public function indexLaporan()
    {
        $rekams = Rekam::all();
        return view('dashboard.cetak.cetakLaporan', ['rekams' => $rekams]);
    }

    public function cetakLaporanExcel()
    {
        if (!auth()->check() || !auth()->user()->is_admin) {

            abort(403);

        }
        return Excel::download(new LaporanExport, 'laporan-'.Carbon::now()->timestamp.'.xlsx');
    }

    public function cetakLaporan()
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }

        // Ambil data laporan (gantilah ini dengan cara sesuai dengan aplikasi Anda)
        $laporanData = Rekam::all(); // Ambil data laporan sesuai dengan kebutuhan

        return view('cetakLaporan', ['laporanData' => $laporanData]);
    }
    // public function filterData(Request $request)
    // {
    //     $selectedOption = $request->input('selectedOption');

    //     // Lakukan filter data berdasarkan $selectedOption
    //     $data = $this->filterDataByOption($selectedOption);

    //     return view('dashboard.laporan.index', compact('data'));
    // }

    // private function filterDataByOption($selectedOption)
    // {
    //     // Logika filter data berdasarkan pilihan
    //     // Misalnya, filter data berdasarkan "hari ini," "minggu ini," "bulan ini"
    //     if ($selectedOption === 'today') {
    //         $data = YourModel::whereDate('tanggal_kunjungan', Carbon::today())->get();
    //     } elseif ($selectedOption === 'this-week') {
    //         $data = YourModel::whereBetween('tanggal_kunjungan', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
    //     } elseif ($selectedOption === 'this-month') {
    //         $data = YourModel::whereYear('tanggal_kunjungan', Carbon::now()->year)
    //             ->whereMonth('tanggal_kunjungan', Carbon::now()->month)
    //             ->get();
    //     return $filteredData;
    // }


    // }


    public function filterLaporan(Request $request)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }

        $selectedOption = $request->input('selectedOption');
        $query = Rekam::query(); // Membuat query builder Rekam

        if ($selectedOption == 'today') {
            $query->whereDate('tanggal_kunjungan', now()->toDateString());
        } elseif ($selectedOption == 'this-week') {
            $query->whereBetween('tanggal_kunjungan', [now()->startOfWeek(), now()->endOfWeek()]);
        } elseif ($selectedOption == 'this-month') {
            $query->whereMonth('tanggal_kunjungan', now()->month);
        }

        $rekams = $query->get(); // Mengambil data rekam berdasarkan filter

        return view('dashboard.laporan.index', [
            'rekams' => $rekams
        ]);
    }


}
