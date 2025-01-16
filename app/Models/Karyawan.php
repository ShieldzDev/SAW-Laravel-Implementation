<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [
        'nama',
        'pengalaman_kerja',
        'pendidikan',
        'umur',
        'kepribadian',
    ];
}
