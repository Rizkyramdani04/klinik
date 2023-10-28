<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER transfer_data_after_insert
            AFTER INSERT ON pasiens
            FOR EACH ROW
            BEGIN
                INSERT INTO rekams (nama, alamat, tanggal_lahir, nik, jenis_kelamin, telepon, layanan)
                VALUES (NEW.nama, NEW.alamat, NEW.tanggal_lahir, NEW.nik, NEW.jenis_kelamin, NEW.telepon, NEW.layanan);
            END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS transfer_data_after_insert');
    }
};
