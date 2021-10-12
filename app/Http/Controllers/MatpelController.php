<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matpel;

class MatpelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'nama_matpel' => 'required'
        ],
        [
            'nama_matpel.required' => 'Nama Matapelajaran tidak boleh kosong'
        ]);

        $matpel = new Matpel;
        $matpel->nama_matpel = $request->nama_matpel;
        $matpel->save();

        return redirect('/')->with('pesan', 'Matpel berhasil ditambahkan');
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
        $matpel = Matpel::find($id);
        return view('editMatpel', compact('matpel'));
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
            'nama_matpel' => 'required'
        ],
        [
            'nama_matpel.required' => 'Nama Matapelajaran tidak boleh kosong'
        ]);

        Matpel::where('id', $id)
            ->update([
                'nama_matpel' => $request->nama_matpel
            ]);
            return redirect('/')->with('pesan', 'Matpel berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matpel::where('id',$id)->delete();
        return redirect('/')->with('pesan', 'Matpel berhasil dihapus');
    }
}
