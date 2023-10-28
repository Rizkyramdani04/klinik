<?php

namespace App\Exports;

use App\Models\Rekam;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\withColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanExport implements FromCollection, WithHeadings, withColumnFormatting, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rekam::all();
        foreach ($data as $row) {
            // Format sesuai dengan jumlah digit yang diharapkan
          $row->nik = sprintf(' %16d ', $row->nik);
          $row->nik = '"' . $row->nik;
        }

        return $data;
    }

    public function headings(): array
    {
        // Daftar judul kolom sesuai dengan urutan kolom dalam tabel rekam
        return [
            'No',
            'Nama',
            'Alamat',
            'Tanggal Lahir',
            'NIK',
            'Jenis Kelamin',
            'Nomor Telepon',
            'Layanan',
            'Tanggal Kunjungan',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'NIK' => '@', '0', // Format kolom NIK sesuai dengan angka
        ];
    }


}
