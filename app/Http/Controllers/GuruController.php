<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Matpel;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gurus = Guru::all();
        return view('guru', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matpels = Matpel::all();
        return view('addguru', compact('matpels'));
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
            'nip' => 'required|unique:guru',
            'nama_guru' => 'required',
            'jenis_kelamin_guru' => 'required',
            'tempat_lahir_guru' => 'required',
            'tgl_lahir_guru' => 'required',
            'foto' => 'required',
            'id_matpel' => 'required'
        ], 
        [
            'nip.required' => 'Nip tidak boleh kosong',
            'nip.unique' => 'Nip sudah terdaftar',
            'nama_guru.required' => 'Nama Guru tidak boleh kosong',
            'jenis_kelamin_guru.required' => 'Jenis Kelamin tidak boleh kosong',
            'tempat_lahir_guru.required' => 'Tempat Lahir tidak boleh kosong',
            'tgl_lahir_guru.required' => 'Tanggal Lahir tidak boleh kosong',
            'foto.required' => 'Foto Guru tidak boleh kosong',
            'id_matpel.required' => 'Kelas tidak boleh kosong'
        ]);

        $rename = $request->foto;
        $namaFoto = time().rand(100,999).".".$rename->extension();

        $guru = new Guru;
        $guru->nip = $request->nip;
        $guru->nama_guru = $request->nama_guru;
        $guru->jenis_kelamin_guru = $request->jenis_kelamin_guru;
        $guru->tempat_lahir_guru = $request->tempat_lahir_guru;
        $guru->tgl_lahir_guru = $request->tgl_lahir_guru;
        $guru->foto = $namaFoto;
        $guru->id_matpel = $request->id_matpel;

        $rename->move(public_path().'/fotoGuru',$namaFoto);

        $guru->save();
        return redirect('guru')->with('pesan', 'Data guru berhasil ditambahkan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = Guru::find($id);
        return view('detailguru', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::find($id);
        $matpels = Matpel::all();
        return view('editguru', compact('guru', 'matpels'));
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
            'nip' => 'required|unique:guru'. ($id ? ",id,$id" : ''),
            'nama_guru' => 'required',
            'jenis_kelamin_guru' => 'required',
            'tempat_lahir_guru' => 'required',
            'tgl_lahir_guru' => 'required',
            'id_matpel' => 'required'
        ], 
        [
            'nip.required' => 'Nip tidak boleh kosong',
            'nip.unique' => 'Nip sudah terdaftar',
            'nama_guru.required' => 'Nama Guru tidak boleh kosong',
            'jenis_kelamin_guru.required' => 'Jenis Kelamin tidak boleh kosong',
            'tempat_lahir_guru.required' => 'Tempat Lahir tidak boleh kosong',
            'tgl_lahir_guru.required' => 'Tanggal Lahir tidak boleh kosong',
            'id_matpel.required' => 'Kelas tidak boleh kosong'
        ]);

        if(Request()->foto <> "") {
            $rename = $request->foto;
            $namaFoto = time().rand(100,999).".".$rename->getClientOriginalExtension();

            $rename->move(public_path().'/fotoGuru',$namaFoto);

            Guru::where('id', $request->id)
                ->update([
                    'nip' => $request->nip,
                    'nama_guru' => $request->nama_guru,
                    'jenis_kelamin_guru' => $request->jenis_kelamin_guru,
                    'tempat_lahir_guru' => $request->tempat_lahir_guru,
                    'tgl_lahir_guru' => $request->tgl_lahir_guru,
                    'foto' => $namaFoto,
                    'id_matpel' => $request->id_matpel
                ]);
        }else{
            Guru::where('id', $request->id)
                ->update([
                    'nip' => $request->nip,
                    'nama_guru' => $request->nama_guru,
                    'jenis_kelamin_guru' => $request->jenis_kelamin_guru,
                    'tempat_lahir_guru' => $request->tempat_lahir_guru,
                    'tgl_lahir_guru' => $request->tgl_lahir_guru,
                    'id_matpel' => $request->id_matpel
                ]);
        }
        return redirect('guru')->with('pesan', 'Data guru berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Guru::where('id', $id)->delete();
        return redirect('guru')->with('pesan', 'Data guru berhasil dihapus');
    }
}
