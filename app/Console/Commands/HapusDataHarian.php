<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\Pasien; // Gantilah NamaModel dengan nama model yang sesuai

class HapusDataHarian extends Command
{
    protected $signature = 'data:harian';

    protected $description = 'Menghapus data tertentu setiap hari';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $today = now()->toDateString();
        NamaModel::whereDate('tanggal_kolom', '<', $today)->delete();
        $this->info('Data berhasil dihapus.');
    }
}

