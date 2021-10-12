@extends('templates.main')

@section('title','Data siswa')

@section('content')
    <div class="data-title">
        <h2>Data Siswa</h2>
        <a class="btn btn-primary btn-lg blue" role="button" href="{{url('/siswa/add')}}">Tambah Data</a>
    </div>

    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{session('pesan')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    
    <h3 class="mb-4">Rekayasa Perangkat Lunak</h3>
    <div class="table-responsive">
    <table id="data-siswa" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;?>
            @foreach ($siswas as $s)
            @if ($s->jurusan["jurusan"] == "RPL 1" || $s->jurusan["jurusan"] == "RPL 2")  
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$s->nisn}}</td>
                    <td>{{$s->nama_siswa}}</td>
                    <td>{{$s->jenis_kelamin}}</td>
                    <td>{{$s->kelas['kelas']}}</td>
                    <td>{{$s->jurusan['jurusan']}}</td>
                    <td class="text-center">
                        <a class="btn btn-warning" role="button" href="{{url('/siswa/edit/'.$s->id)}}"><i class="bx bxs-edit edit"></i></a>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapusDataSiswa{{$s->id}}"><i class="bx bxs-trash delete"></i></button>
                        <a class="btn btn-primary" role="button" href="{{url('/siswa/detail/'.$s->id)}}"><i class="bx bxs-user-detail detail"></i></a>
                    </td>
                </tr>
            @endif

            {{-- Modal delete --}}
            <div class="modal fade" id="hapusDataSiswa{{$s->id}}" tabindex="-1" aria-labelledby="hapusDataSiswa" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-body">
                <h4 class="text-center">Apakah anda yakin?</h4>
                </div>
                <div class="modal-footer">
                <form action="{{url('/siswa/delete/'.$s->id)}}" method="post">
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

    <hr class="mt-5">
    <h3 class="mb-3 mt-2">Multimedia</h3>
    <div class="table-responsive">
        <table id="data-siswa-mm" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;?>
                @foreach ($siswas as $s)
                @if ($s->jurusan["jurusan"] == "MM 1" || $s->jurusan["jurusan"] == "MM 2")  
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$s->nisn}}</td>
                        <td>{{$s->nama_siswa}}</td>
                        <td>{{$s->jenis_kelamin}}</td>
                        <td>{{$s->kelas['kelas']}}</td>
                        <td>{{$s->jurusan['jurusan']}}</td>
                        <td class="text-center">
                            <a class="btn btn-warning" role="button" href="{{url('/siswa/edit/'.$s->id)}}"><i class="bx bxs-edit edit"></i></a>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#hapusDataSiswa{{$s->id}}"><i class="bx bxs-trash delete"></i></button>
                            <a class="btn btn-primary" role="button" href="{{url('/siswa/detail/'.$s->id)}}"><i class="bx bxs-user-detail detail"></i></a>
                        </td>
                    </tr>
                @endif
    
                {{-- Modal delete --}}
                <div class="modal fade" id="hapusDataSiswa{{$s->id}}" tabindex="-1" aria-labelledby="hapusDataSiswa" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-body">
                    <h4 class="text-center">Apakah anda yakin?</h4>
                    </div>
                    <div class="modal-footer">
                    <form action="{{url('/siswa/delete/'.$s->id)}}" method="post">
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

        <hr class="mt-5">
        <h3 class="mb-3 mt-2">Akomodasi Perhotelan</h3>
        <div class="table-responsive">
            <table id="data-siswa-aph" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;?>
                    @foreach ($siswas as $s)
                    @if ($s->jurusan["jurusan"] == "APH 1" || $s->jurusan["jurusan"] == "APH 2")  
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$s->nisn}}</td>
                            <td>{{$s->nama_siswa}}</td>
                            <td>{{$s->jenis_kelamin}}</td>
                            <td>{{$s->kelas['kelas']}}</td>
                            <td>{{$s->jurusan['jurusan']}}</td>
                            <td class="text-center">
                                <a class="btn btn-warning" role="button" href="{{url('/siswa/edit/'.$s->id)}}"><i class="bx bxs-edit edit"></i></a>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#hapusDataSiswa{{$s->id}}"><i class="bx bxs-trash delete"></i></button>
                                <a class="btn btn-primary" role="button" href="{{url('/siswa/detail/'.$s->id)}}"><i class="bx bxs-user-detail detail"></i></a>
                            </td>
                        </tr>
                    @endif
        
                    {{-- Modal delete --}}
                    <div class="modal fade" id="hapusDataSiswa{{$s->id}}" tabindex="-1" aria-labelledby="hapusDataSiswa" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-body">
                        <h4 class="text-center">Apakah anda yakin?</h4>
                        </div>
                        <div class="modal-footer">
                        <form action="{{url('/siswa/delete/'.$s->id)}}" method="post">
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

            <hr class="mt-5">
            <h3 class="mb-3 mt-2">Akuntansi dan Keuangan Lembaga</h3>
            <div class="table-responsive">
                <table id="data-siswa-akl" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        @foreach ($siswas as $s)
                        @if ($s->jurusan["jurusan"] == "AKL 1" || $s->jurusan["jurusan"] == "AKL 2")  
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$s->nisn}}</td>
                                <td>{{$s->nama_siswa}}</td>
                                <td>{{$s->jenis_kelamin}}</td>
                                <td>{{$s->kelas['kelas']}}</td>
                                <td>{{$s->jurusan['jurusan']}}</td>
                                <td class="text-center">
                                    <a class="btn btn-warning" role="button" href="{{url('/siswa/edit/'.$s->id)}}"><i class="bx bxs-edit edit"></i></a>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#hapusDataSiswa{{$s->id}}"><i class="bx bxs-trash delete"></i></button>
                                    <a class="btn btn-primary" role="button" href="{{url('/siswa/detail/'.$s->id)}}"><i class="bx bxs-user-detail detail"></i></a>
                                </td>
                            </tr>
                        @endif
            
                        {{-- Modal delete --}}
                        <div class="modal fade" id="hapusDataSiswa{{$s->id}}" tabindex="-1" aria-labelledby="hapusDataSiswa" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-body">
                            <h4 class="text-center">Apakah anda yakin?</h4>
                            </div>
                            <div class="modal-footer">
                            <form action="{{url('/siswa/delete/'.$s->id)}}" method="post">
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

                <hr class="mt-5">
                <h3 class="mb-3 mt-2">Teknik Bisnis Sepeda Motor</h3>
                <div class="table-responsive">
                    <table id="data-siswa-tbsm" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach ($siswas as $s)
                            @if ($s->jurusan["jurusan"] == "TBSM 1" || $s->jurusan["jurusan"] == "TBSM 2")  
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$s->nisn}}</td>
                                    <td>{{$s->nama_siswa}}</td>
                                    <td>{{$s->jenis_kelamin}}</td>
                                    <td>{{$s->kelas['kelas']}}</td>
                                    <td>{{$s->jurusan['jurusan']}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-warning" role="button" href="{{url('/siswa/edit/'.$s->id)}}"><i class="bx bxs-edit edit"></i></a>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapusDataSiswa{{$s->id}}"><i class="bx bxs-trash delete"></i></button>
                                        <a class="btn btn-primary" role="button" href="{{url('/siswa/detail/'.$s->id)}}"><i class="bx bxs-user-detail detail"></i></a>
                                    </td>
                                </tr>
                            @endif
                
                            {{-- Modal delete --}}
                            <div class="modal fade" id="hapusDataSiswa{{$s->id}}" tabindex="-1" aria-labelledby="hapusDataSiswa" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-body">
                                <h4 class="text-center">Apakah anda yakin?</h4>
                                </div>
                                <div class="modal-footer">
                                <form action="{{url('/siswa/delete/'.$s->id)}}" method="post">
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

                    <hr class="mt-5">
                    <h3 class="mb-3 mt-2">Teknik Kendaraan Ringan Otomotif</h3>
                    <div class="table-responsive">
                        <table id="data-siswa-tkro" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;?>
                                @foreach ($siswas as $s)
                                @if ($s->jurusan["jurusan"] == "TKRO 1" || $s->jurusan["jurusan"] == "TKRO 2")  
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$s->nisn}}</td>
                                        <td>{{$s->nama_siswa}}</td>
                                        <td>{{$s->jenis_kelamin}}</td>
                                        <td>{{$s->kelas['kelas']}}</td>
                                        <td>{{$s->jurusan['jurusan']}}</td>
                                        <td class="text-center">
                                            <a class="btn btn-warning" role="button" href="{{url('/siswa/edit/'.$s->id)}}"><i class="bx bxs-edit edit"></i></a>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#hapusDataSiswa{{$s->id}}"><i class="bx bxs-trash delete"></i></button>
                                            <a class="btn btn-primary" role="button" href="{{url('/siswa/detail/'.$s->id)}}"><i class="bx bxs-user-detail detail"></i></a>
                                        </td>
                                    </tr>
                                @endif
                    
                                {{-- Modal delete --}}
                                <div class="modal fade" id="hapusDataSiswa{{$s->id}}" tabindex="-1" aria-labelledby="hapusDataSiswa" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-body">
                                    <h4 class="text-center">Apakah anda yakin?</h4>
                                    </div>
                                    <div class="modal-footer">
                                    <form action="{{url('/siswa/delete/'.$s->id)}}" method="post">
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