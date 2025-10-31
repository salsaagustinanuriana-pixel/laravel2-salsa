<?php
namespace App\Models;

use App\Models\ProdukStok;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
   
    protected $fillable = ['kode_transaksi' , 'tanggal', 'pelanggan_id', 'total_harga'];

    public function pelanggan()
    {
        return $this->belongsTo(ProdukStok::class);
    }
}
