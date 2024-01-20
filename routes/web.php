<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RekamController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/daftar', [DashboardController::class, 'indexAntrian'])->middleware('auth');
Route::get('/dashboard/daftar/pasienLama', [DashboardController::class, 'indexPasienLama'])->middleware('auth');
Route::get('/dashboard/cetak/cetakAntrian/{no_antrian}', [DashboardController::class, 'cetakNomorAntrian'])->name('cetak.antrian');
Route::get('/daftar/edit/{id}', [DashboardController::class, 'edit'])->name('daftar.edit');
Route::post('/dashboard/daftar', [DashboardController::class, 'store'])->name('daftar.store');
//Route::get('/daftar/edit/{id}', 'DashboardController@edit')->name('daftar.edit');
Route::post('/dashboard/antrian/reset', [DashboardController::class, 'resetAntrian'])
    ->name('antrian.reset');



Route::resource('/dashboard/pasien', PasienController::class)->middleware('auth');
Route::group(['middleware' => ['admin']], function () {
    Route::resource('/dashboard/dokter', DokterController::class);
    Route::resource('/dashboard/layanan', LayananController::class);
    Route::get('/dashboard/laporan', [LaporanController::class, 'index'])->middleware('auth');
    Route::get('/cetak-laporan-excel', [LaporanController::class, 'cetakLaporanExcel'])->name('cetak-laporan-excel');
  //  Route::get('/cetak-laporan', 'LaporanController@cetakLaporan')->name('cetak-laporan');
    Route::get('/dashboard/cetak/cetakLaporan', [LaporanController::class, 'indexLaporan'])->middleware('auth');
    Route::post('/filter-laporan', [LaporanController::class, 'filterLaporan'])->name('filter-laporan');
    // Route::post('/dashboard/antrian/reset', [PasienController::class, 'resetAntrian'])
    // ->name('antrian.reset');
});

Route::get('/cetak-member/{id}/{nama}/{tanggal_lahir}', [DashboardController::class, 'cetakKartuMember'])->name('cetak.member');
Route::get('/transfer-data', [RekamController::class, 'transferData'])->name('rekam.transfer');


