<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('auth');
    }

    public function login(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required'
        ],[
            'name.required' => 'username harus masih kosong',
            'password.required' => 'password harus masih kosong',
        ]);

       $data = User::where('name',$request->name)->first();
       if($data){
           if(Hash::check($request->password,$data->password)){
               $request->session()->put('submit', true);
               $request->session()->put('name', $data->name);
               return redirect('/');
           }else{
            return redirect('/login')->with('pesan', 'password anda salah');
           }
       }
       return redirect('/login')->with('pesan', 'Username atau password salah');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/login');
    }
}