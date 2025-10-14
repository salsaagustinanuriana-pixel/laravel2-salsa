<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
  protected $fillable = ['nama', 'id_mahasiswa'];

  //membuat relasi dari wali ke mahasiswa
  public function mahasiswa()
  {
     //data wali bisa memiliki oleh Mahasiswa melalui fk id_mahasiswa
     return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
  }
}
