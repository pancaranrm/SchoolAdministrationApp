@extends('templates.main')

@section('title','Detail Data Siswa')

@section('content')
<div class="container">
    <div class="card kartu">
        <div class="row">
        <div class="foto">
            <img src="{{asset('fotoSiswa/'.$siswa->foto)}}" alt="">
        </div>
        <div class="kertas-biodata">
        <div class="biodata">
        <table width="100%" border="0">
            <tbody>
                <tr>
                <td valign="top">
                <table border="0" class="tbl-detail" width="100%">
                <tbody>
                <tr>
                <td class="text" valign="top">Nama</td>
                    <td>: </td>
                    <td>{{$siswa->nama_siswa}}</td>
                </tr>
                <td class="text">NISN</td>
                    <td>: </td>
                    <td>{{$siswa->nisn}}</td>
                </tr>
                <tr>
                    <td class="text">Jenis Kelamin</td>
                        <td>: </td>
                        <td>{{$siswa->jenis_kelamin}}</td>
                    </tr>
                <tr>
                    <td class="text">Tempat Lahir</td>
                        <td>: </td>
                        <td>{{$siswa->tempat_lahir}}</td>
                    </tr>
                <tr>
                    <td class="text">Tanggal Lahir</td>
                        <td>: </td>
                        <td>{{$siswa->tgl_lahir}}</td>
                    </tr>
                <tr>
                <tr>
                    <td class="text">Agama</td>
                        <td>: </td>
                        <td>{{$siswa->agama}}</td>
                    </tr>
                <tr>
                    <td class="text">Kelas</td>
                        <td>: </td>
                        <td>{{$siswa->kelas['kelas']}} {{$siswa->jurusan['jurusan']}}</td>
                </tbody></table>
                </td>
            </tr>
            </tbody>
        </table>
        </div>
        </div>
        </div>
    </div>
    </div>
@endsection