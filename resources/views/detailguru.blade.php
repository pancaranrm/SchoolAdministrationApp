@extends('templates.main')

@section('title','Detail Data Guru')

@section('content')
<div class="container">
    <div class="card kartu">
        <div class="row">
        <div class="foto">
            <img src="{{asset('fotoGuru/'.$guru->foto)}}" alt="">
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
                    <td>{{$guru->nama_guru}}</td>
                </tr>
                <td class="text">NIP</td>
                    <td>: </td>
                    <td>{{$guru->nip}}</td>
                </tr>
                <tr>
                    <td class="text">Jenis Kelamin</td>
                        <td>: </td>
                        <td>{{$guru->jenis_kelamin_guru}}</td>
                    </tr>
                <tr>
                    <td class="text">Tempat Lahir</td>
                        <td>: </td>
                        <td>{{$guru->tempat_lahir_guru}}</td>
                    </tr>
                <tr>
                    <td class="text">Tanggal Lahir</td>
                        <td>: </td>
                        <td>{{$guru->tgl_lahir_guru}}</td>
                    </tr>
                <tr>
                    <td class="text">Matpel</td>
                        <td>: </td>
                        <td>{{$guru->matpel['nama_matpel']}}</td>
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