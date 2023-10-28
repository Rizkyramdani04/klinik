<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $table = 'layanans'; // Sesuaikan dengan nama tabel di basis data Anda
    protected $fillable = ['nama'];

    public function pasien(){
        return $this->belongsTo(Pasien::class);
    }
}
