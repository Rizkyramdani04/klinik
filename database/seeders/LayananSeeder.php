<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data awal untuk tabel 'layanan'
        $data = [
            ['nama_layanan' => 'Treatment'],
            ['nama_layanan' => 'Suntik Botoks'],
            ['nama_layanan' => 'Suntik Whitening'],
            // Tambahkan data lain sesuai kebutuhan Anda
        ];

        // Masukkan data ke dalam tabel 'layanan'
        DB::table('layanan')->insert($data);
    }
}
