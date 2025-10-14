<?php

namespace Database\Seeders;

use App\Models\Hobi;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class HobiSeeder extends Seeder
{
    public function run()
    {
        
        $hobi1 = Hobi::create(['nama_hobi' => 'Membaca Buku']);
        $hobi2 = Hobi::create(['nama_hobi' => 'Bermain Bola']);
        $hobi3 = Hobi::create(['nama_hobi' => 'Bernyanyi']);
        $hobi4 = Hobi::create(['nama_hobi' => 'Coding']);

       
        $mahasiswas = Mahasiswa::all();

        
        foreach ($mahasiswas as $mhs) {
            $randomHobi = [$hobi1->id, $hobi2->id, $hobi3->id, $hobi4->id];
            shuffle($randomHobi);
            $mhs->hobis()->attach(array_slice($randomHobi, 0, rand(1, 3)));
        }
    }
}

