<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    public function run(): void
    {
        Karyawan::create([
            'nama' => 'John Doe',
            'pengalaman_kerja' => 5,
            'pendidikan' => 'S1',
            'umur' => 28,
            'kepribadian' => 'Proaktif',
        ]);

        Karyawan::create([
            'nama' => 'Jane Smith',
            'pengalaman_kerja' => 3,
            'pendidikan' => 'D3',
            'umur' => 24,
            'kepribadian' => 'Ramah',
        ]);

        // Tambah data lainnya
    }
}
