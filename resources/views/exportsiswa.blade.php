@extends('templates.main')

@section('title','Data siswa')

@section('content')
    <div class="data-title">
        <h2>Export Data Siswa</h2>
        <div class="export-group">
            <a class="btn-export" href="{{url('/export/siswa')}}">Siswa</a>
            <a class="btn-export" href="{{url('/export/guru')}}">Guru</a>
        </div>
    </div>
    
    <div class="table-responsive">
    <table id="data-siswa-export" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;?>
            @foreach ($siswas as $s)
            <tr>
                <th>{{$no++}}</th>
                <th>{{$s->nisn}}</th>
                <th>{{$s->nama_siswa}}</th>
                <th>{{$s->jenis_kelamin}}</th>
                <th>{{$s->kelas['kelas']}}</th>
                <th>{{$s->jurusan['jurusan']}}</th>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

@endsection