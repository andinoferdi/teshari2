<?php

namespace Database\Seeders;

use App\Models\buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class bukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        buku::create(['nama_buku' => 'Melodis']);
        buku::create(['nama_buku' => 'Ritmis']);
        buku::create(['nama_buku' => 'Harmonis']);
    }
}
