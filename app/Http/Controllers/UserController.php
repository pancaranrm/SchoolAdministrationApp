<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Matpel;

class UserController extends Controller
{
    public function guru(){
        $gurus = Guru::all();
        return view('user.guru', compact('gurus'));
    }
}
