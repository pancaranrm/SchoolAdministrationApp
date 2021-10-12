<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    public function jurusan() {
        return $this->belongsTo('\App\Models\Jurusan', 'id_jurusan');
    }

    public function kelas() {
        return $this->belongsTo('\App\Models\Kelas', 'id_kelas');
    }
}
