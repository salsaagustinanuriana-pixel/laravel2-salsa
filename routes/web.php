<?php
use App\Http\Controller\MyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\RelasiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\WaliController;
use App\Http\Controllers\HobiController;
use App\Http\Controllers\ProdukStokController;
use App\Http\Controllers\PembayaranController;


use App\Models\Wali;
use App\Models\Mahasiswa;
use App\Models\Hobi;



Route::get('/one-to-one', [RelasiController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//post
Route::get('post', [PostController::class, 'index'])->name('post.index');

// tambah data post
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post', [PostController::class, 'store'])->name('post.store');

// edit data post
Route::get('post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('post/{id}', [PostController::class, 'update'])->name('post.update');

// show data post
Route::get('post/{id}', [PostController::class, 'show'])->name('post.show');

// hapus data
Route::delete('post/{id}', [PostController::class, 'destroy'])->name('post.delete');

Route::resource('produk', App\Http\Controllers\ProdukController::class)->middleware('auth');

Route::get('/biodata', [BiodataController::class, 'index']);

Route::resource('biodata',BiodataController::class);

Route::get('/one-to-one', [RelasiController::class, 'index']);
Route::get('/wali-ke-mahasiswa', function () {
    $wali = App\Models\Wali::with('mahasiswa')->first();
    return "{$wali->nama} adalah wali dari {$wali->mahasiswa->nama}";
});

Route::get('/one-to-many', [RelasiController::class, 'oneToMany']);
Route::get('/mahasiswa-ke-dosen', function () {
    $mhs = Mahasiswa::where('nim', '123456')->first();
    return "{$mhs->nama} dibimbing oleh {$mhs->dosen->nama}";
});

Route::get('/many-to-many', [RelasiController::class, 'manyToMany']);
Route::get('/hobi/bola', function () {
    $hobi = Hobi::where('nama_hobi', 'Bermain Bola')->first();
    foreach ($hobi->mahasiswas as $mhs) {
        echo $mhs->nama . '<br>';
    }
});

Route::get('eloquent', [RelasiController::class, 'eloquent']);

Route::resource('dosen', DosenController::class);

Route::resource('hobi', HobiController::class);

Route::resource('mahasiswa',App\Http\Controllers\MahasiswaController::class);

Route::resource('wali',WaliController::class);

Route::resource('pelanggan',App\Http\Controllers\PelangganController::class);

Route::resource('produk-stok',ProdukStokController::class)->parameters([
    'produk-stok' => 'produk',
]);

Route::resource('transaksis', App\Http\Controllers\TransaksiController::class);


Route::resource('detail_transaksi',App\Http\Controllers\DetailTransaksiController::class);

Route::resource('pembayarans',PembayaranController::class);




