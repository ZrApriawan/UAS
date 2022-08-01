<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;

    protected $table = 'golongan';


    protected $fillable = ['kode_golongan', 'nama_golongan', 'tunjangan_suami_istri', 'tunjangan_anak', 'uang_lembur'];
}
