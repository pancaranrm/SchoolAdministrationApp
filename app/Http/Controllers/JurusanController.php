<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Matpel;
use App\Models\Guru;
use App\Models\Siswa;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusans = Jurusan::all();
        $kelases = Kelas::all();
        $matpels = Matpel::all();
        $siswas = Siswa::all();
        $gurus = Guru::all();
        return view('addproperti', compact('jurusans', 'kelases', 'matpels', 'siswas', 'gurus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jurusan' => 'required'
        ],
        [
            'jurusan.required' => 'Jurusan tidak boleh kosong'
        ]);

        $jurusan = new Jurusan;
        $jurusan->jurusan = $request->jurusan;
        $jurusan->save();

        return redirect('/')->with('pesan', 'Jurusan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = Jurusan::find($id);
        return view('editProperti', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jurusan' => 'required'
        ],
        [
            'jurusan.required' => 'Jurusan tidak boleh kosong'
        ]);

        Jurusan::where('id', $request->id)
            ->update([
                'jurusan' => $request->jurusan
            ]);
        
        return redirect('/')->with('pesan', 'Jurusan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jurusan::destroy($id);
        return redirect('/')->with('pesan', 'Jurusan berhasil dihapus');
    }
}
