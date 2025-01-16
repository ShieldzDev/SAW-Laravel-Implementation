<?php

namespace App\Services;

use App\Models\Karyawan;
use Illuminate\Support\Facades\Config;

class SAWService
{
    public function calculate()
    {
        $criteria = Config::get('saw.criteria');
        $pendidikanScore = Config::get('saw.pendidikan_score');

        $karyawans = Karyawan::all();

        // Normalisasi data
        $maxValues = [
            'pengalaman_kerja' => $karyawans->max('pengalaman_kerja'),
            'umur' => $karyawans->max('umur'),
        ];

        $results = $karyawans->map(function ($karyawan) use ($criteria, $pendidikanScore, $maxValues) {
            $normalisasi = [
                'pengalaman_kerja' => $karyawan->pengalaman_kerja / $maxValues['pengalaman_kerja'],
                'umur' => $karyawan->umur / $maxValues['umur'],
                'pendidikan' => $pendidikanScore[$karyawan->pendidikan] ?? 0,
                'kepribadian' => 1, // Bisa disesuaikan dengan skala yang relevan
            ];

            $totalScore = 0;
            foreach ($criteria as $key => $weight) {
                $totalScore += $normalisasi[$key] * $weight;
            }

            return [
                'nama' => $karyawan->nama,
                'score' => $totalScore,
            ];
        });

        return $results->sortByDesc('score');
    }
}
