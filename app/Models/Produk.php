<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['nama', 'deskripsi', 'harga' ];
    protected $visible  = ['nama', 'deskripsi', 'harga' ];

    public function transaksis()
    {
        return $this->belongsToMany(Transaksi::class,'detail_transaksi','id_produk','id_transaksi')
        ->withPivot('jumlah','sub_total')
        ->withTimestamp();
    }
}
