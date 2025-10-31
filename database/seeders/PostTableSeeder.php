<?php
namespace Database\Seeders;

use DB;
//inport package
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $post = [
            ['title' => 'Belajar Laravel', 'content' => 'Lorem Ipsum'],
            ['title' => 'Tips Belajar Laravel', 'content' => 'Lorem Ipsum'],
            ['title' => 'Jadwal Latihan Workout Bulanan', 'content' => 'Lorem Ipsum'],
        ];
        DB::table('posts')->insert($post);
    }
}
