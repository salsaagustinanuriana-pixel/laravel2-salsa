<?php
use App\Http\Controller\MyController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\RelasiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\HobiController;
use App\Models\Wali;
use App\Models\Mahasiswa;
use App\Models\Hobi;



Route::get('/one-to-one', [RelasiController::class, 'index']);




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
