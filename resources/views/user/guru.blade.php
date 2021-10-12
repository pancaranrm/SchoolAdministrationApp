@extends('templates.user')

@section('title', 'Data Guru Siswa')

@section('content')
<div class="container">
    <div class="table-responsive">
        <table id="data-guru-user" class="table table-striped table-bordered">
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
                    <td>{{$no++}}</td>
                    <td>{{$g->nip}}</td>
                    <td>{{$g->nama_guru}}</td>
                    <td>{{$g->jenis_kelamin_guru}}</td>
                    <td>{{$g->matpel['nama_matpel']}}</td>
                </tr>
                </div>
                </div>
                </div>
                @endforeach
            </tbody>
        </table>
        </div>
</div>
@endsection