<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\Kelas;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::orderBy('id_kelas','desc')
                        ->orderBy('id_jurusan','asc')
                        ->orderBy('nama_siswa', 'asc')
                        ->get();
        return view('siswa', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        return view('addsiswa' ,compact('jurusan', 'kelas'));
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
            'nisn' => 'required|unique:siswa',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'foto' => 'required',
            'id_kelas' => 'required',
            'id_jurusan' => 'required',
        ], 
        [
            'nisn.required' => 'Nisn tidak boleh kosong',
            'nisn.unique'=> 'Nisn sudah terdaftar',
            'nama_siswa.required' => 'Nama Siswa tidak boleh kosong',
            'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong',
            'tempat_lahir.required' => 'Tempat Lahir tidak boleh kosong',
            'tgl_lahir.required' => 'Tanggal Lahir tidak boleh kosong',
            'agama.required' => 'Agama tidak boleh kosong',
            'foto.required' => 'Foto Siswa tidak boleh kosong',
            'id_kelas.required' => 'Kelas tidak boleh kosong',
            'id_jurusan.required' => 'Jurusan tidak boleh kosong',
        ]);

        $rename = $request->foto;
        $namaFoto = time().rand(100,999).".".$rename->extension();

        $siswa = new Siswa;
        $siswa->nisn = $request->nisn;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->agama = $request->agama;
        $siswa->foto = $namaFoto;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->id_jurusan = $request->id_jurusan;

        $rename->move(public_path().'/fotoSiswa',$namaFoto);

        $siswa->save();
        return redirect('siswa')->with('pesan', 'data siswa berhasil ditambahkan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return view('detailsiswa', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        return view('editSiswa', compact('siswa', 'jurusan', 'kelas'));
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
            'nisn' => 'required|unique:siswa'. ($id ? ",id,$id" : ''),
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'id_kelas' => 'required',
            'id_jurusan' => 'required',
        ], 
        [
            'nisn.required' => 'Nisn tidak boleh kosong',
            'nisn.unique'=> 'Nisn sudah terdaftar',
            'nama_siswa.required' => 'Nama Siswa tidak boleh kosong',
            'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong',
            'tempat_lahir.required' => 'Tempat Lahir tidak boleh kosong',
            'tgl_lahir.required' => 'Tanggal Lahir tidak boleh kosong',
            'agama.required' => 'Agama tidak boleh kosong',
            'id_kelas.required' => 'Kelas tidak boleh kosong',
            'id_jurusan.required' => 'Jurusan tidak boleh kosong',
        ]);

        if(Request()->foto <> "") {
            $rename = $request->foto;
            $namaFoto = time().rand(100,999).".".$rename->getClientOriginalExtension();

            $rename->move(public_path().'/fotoSiswa',$namaFoto);

            Siswa::where('id', $request->id)
                ->update([
                    'nisn' => $request->nisn,
                    'nama_siswa' => $request->nama_siswa,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tgl_lahir' => $request->tgl_lahir,
                    'agama' => $request->agama,
                    'foto' => $namaFoto,
                    'id_kelas' => $request->id_kelas,
                    'id_jurusan' => $request->id_jurusan
                ]);
        }else{
            Siswa::where('id', $request->id)
                ->update([
                    'nisn' => $request->nisn,
                    'nama_siswa' => $request->nama_siswa,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tgl_lahir' => $request->tgl_lahir,
                    'agama' => $request->agama,
                    'id_kelas' => $request->id_kelas,
                    'id_jurusan' => $request->id_jurusan
                ]);
        }
        return redirect('siswa')->with('pesan', 'data siswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::where('id', $id)->delete();
        return redirect('siswa')->with('pesan', 'data siswa berhasil dihapus');
    }
}
