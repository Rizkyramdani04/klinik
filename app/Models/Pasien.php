<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasiens';
    protected $fillable = [
        'nama',
        'alamat',
        'tanggal_lahir',
        'nik',
        'jenis_kelamin',
        'telepon',
        'layanan',
       // 'dokter'
    ];
    protected $guarded =['id'];

    protected $casts = [
        'nik' => 'string',
    ];
    // public function dokters() {
    //     return $this->hasMany(Dokter::class);
    // }

    public function rekam(){
        return $this->hasMany(Rekam::class, 'id');
    }

    public function layanan()
    {
        return $this->hasMany(Layanan::class);
    }

    public function dokter()
    {
        return $this->hasMany(Dokter::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pasien) {
            if (auth()->check()) {
                $pasien->created_by = auth()->user()->id;
            }
        });
    }
}
