<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('no_antrian')->nullable();
            $table->string('nama');
            $table->string('alamat')->nullable();
            $table->date('tanggal_lahir');
            $table->string('nik')->unique()->nullable();
            $table->string('jenis_kelamin');
            $table->string('telepon');
            $table->string('layanan');
            $table->timestamps();
            $table->integer('nomor_antrian')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasiens');
    }
};
