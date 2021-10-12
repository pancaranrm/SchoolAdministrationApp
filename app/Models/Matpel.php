<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matpel extends Model
{
    use HasFactory;

    protected $table = 'matpel';
    
    protected $fillable = ['nama_matpel'];

    public function guru(){
        return $this->hasOne('\App\Models\Guru');
    }
}
