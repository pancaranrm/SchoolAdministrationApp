@extends('templates.main')

@section('title','Data Guru')

@section('content')
    <div class="data-title">
        <h2>Export Data Guru</h2>
        <div class="export-group">
            <a class="btn-export" href="{{url('/export/siswa')}}">Siswa</a>
            <a class="btn-export" href="{{url('/export/guru')}}">Guru</a>
        </div>
    </div>

    <div class="table-responsive">
    <table id="data-guru-export" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>Jenis Kelamin</th>
                <th>Mata Pelajaran</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;?>
            @foreach ($gurus as $g)
            <tr>
                <th>{{$no++}}</th>
                <th>{{$g->nip}}</th>
                <th>{{$g->nama_guru}}</th>
                <th>{{$g->jenis_kelamin_guru}}</th>
                <th>{{$g->matpel['nama_matpel']}}</th>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection