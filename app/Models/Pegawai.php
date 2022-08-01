<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    

    protected $fillable = ['nip', 'nama_pegawai', 'id_jabatan', 'id_golongan', 'status', 'alamat'];

    public function jabatan(){
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }

    public function golongan(){
        return $this->belongsTo(Golongan::class, 'id_golongan');
    }
}
