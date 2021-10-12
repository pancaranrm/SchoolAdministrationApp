@extends('templates.main')

@section('title','Data Guru')

@section('content')
    <div class="data-title">
        <h2>Data Guru</h2>
        <a class="btn btn-primary btn-lg blue" role="button" href="{{url('/guru/add')}}">Tambah Data</a>
    </div>
    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{session('pesan')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="table-responsive">
    <table id="data-guru" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>Jenis Kelamin</th>
                <th>Mata Pelajaran</th>
                <th>Aksi</th>
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
                <td class="text-center">
                    <a class="btn btn-warning mb-2" role="button" href="{{url('/guru/edit/'.$g->id)}}"><i class="bx bxs-edit edit"></i></a>
                    <button class="btn btn-danger mb-2" data-toggle="modal" data-target="#hapusDataGuru{{$g->id}}"><i class="bx bxs-trash delete"></i></button>
                    <a class="btn btn-primary mb-2" role="button" href="{{url('/guru/detail/'.$g->id)}}"><i class="bx bxs-user-detail detail"></i></a>
                </td>
            </tr>

            {{-- Modal delete --}}
            <div class="modal fade" id="hapusDataGuru{{$g->id}}" tabindex="-1" aria-labelledby="hapusDataGuru" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-body">
                <h4 class="text-center">Apakah anda yakin?</h4>
                </div>
                <div class="modal-footer">
                <form action="{{url('/guru/delete/'.$g->id)}}" method="post">
                    @csrf
                    @method('delete')
            
                    <button type="submit" class="btn btn-danger">Ya</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            </div>
            </div>
            </div>
            </div>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection