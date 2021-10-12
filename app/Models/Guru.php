<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

    public function matpel(){
        return $this->belongsTo('\App\Models\Matpel', 'id_matpel');
    }
}
