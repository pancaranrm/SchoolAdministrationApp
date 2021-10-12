<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Guru;

class ExportController extends Controller
{
    public function siswa(){
        $siswas = Siswa::all();
        return view('exportsiswa', compact('siswas'));
    }

    public function guru(){
        $gurus = Guru::all();
        return view('exportguru', compact('gurus'));
    }
}
