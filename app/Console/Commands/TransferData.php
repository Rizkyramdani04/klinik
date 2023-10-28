<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class TransferData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pasien:rekam';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transfer data dari tabel pasien ke tabel rekam';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
      // Logika transfer data di sini
      DB::insert('INSERT INTO rekam (nama, alamat, lahir, nik, kelamin, telepon, layanan) SELECT nama, alamat, lahir, nik, kelamin, telepon, layanan FROM pasien');

        $this->info('Data berhasil ditransfer dari tabel "pasien" ke tabel "rekam".');
    }
}
