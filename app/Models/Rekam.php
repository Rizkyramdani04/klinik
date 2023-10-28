<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekam extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomorantrian',
        'pasien_id',
        'layanan',
        'created_by'
    ];
    protected $guarded =['id'];


    public function pasien(){
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }


  //  public function dokter(){
   //     return $this->belongsTo(Dokter::class, 'id_dokter');
  //  }
}
