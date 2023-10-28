<?php

namespace App\Console\Commands;
namespace App\Models\Pasien;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;

class ResetPasien extends Command
{
    protected $signature = 'pasien:reset';
    protected $description = 'Reset nomor antrian';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Reset nomor antrian ke 0
        DB::table('pasiens')->update(['nomor_antrian' => 0]);

        $this->info('Nomor antrian berhasil direset.');

    }
}
