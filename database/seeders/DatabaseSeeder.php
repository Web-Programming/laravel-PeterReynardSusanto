<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\prodi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      prodi::create(
        [
            'nama' => 'Teknik Informatika'
        ]
        );
    prodi::create(
        [
            'nama' => 'Manajemen Informatika'
        ]
        );
    prodi::create(
        [
            'nama' => 'Sistem Informasi'
        ]
        );
}
}
