<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = 'dokters';

    protected $fillable = ['nama', 'alamat', 'telepon', 'jadwal', 'status'];

    protected $guarded =['id'];

    public function dokter()
    {
        return $this->hasMany(Dokter::class, 'custom_dokter_id_column');
    }

    public function pasien(){
        return $this->belongsTo(Pasien::class);
    }
}
