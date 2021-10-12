@extends('templates.main')
@section('title', 'Properti')

@section('content')
    <div class="dashboard-count">
        <a href="{{url('/siswa')}}" class="item-count">
            <div class="item1">
                <div class="item-title">Total Murid</div>
                <div class="item-total">{{count($siswas)}}</div>
            </div>
            <div class="item2">
                <i class="bx bx-face"></i>
            </div>
        </a>
        <a href="{{url('/guru')}}" class="item-count">
            <div class="item1">
                <div class="item-title">Total Guru</div>
                <div class="item-total">{{count($gurus)}}</div>
            </div>
            <div class="item2">
                <i class="bx bxs-face"></i>
            </div>
        </a>
        <a href="#jurusan" class="item-count">
            <div class="item1">
                <div class="item-title">Total Jurusan</div>
                <div class="item-total">{{count($jurusans)/2}}</div>
            </div>
            <div class="item2">
                <i class="bx bx-transfer"></i>
            </div>
        </a>
        <a href="#kelas" class="item-count">
            <div class="item1">
                <div class="item-title">Total Kelas</div>
                <div class="item-total">{{count($kelases)}}</div>
            </div>
            <div class="item2">
                <i class="bx bxs-door-open"></i>
            </div>
        </a>
    </div>
    <div class="btn-properti">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary blue" data-toggle="modal" data-target="#addjurusan">
            Tambah Jurusan
        </button>

        <button type="button" class="btn btn-primary blue" data-toggle="modal" data-target="#addkelas">
            Tambah Kelas
        </button>

        <button type="button" class="btn btn-primary blue" data-toggle="modal" data-target="#addmatpel">
            Tambah Mata Pelajaran
        </button>
    </div>

    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{session('pesan')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div id="jurusan">
        <br><br>
        <h3>Data Jurusan</h3>
        <table id="data-jurusan" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1?>
            @foreach ($jurusans as $j)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$j->jurusan}}</td>
                <td class="text-center">
                    <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditJurusan{{$j->id}}"><i class="bx bxs-edit edit"></i></button>
                    {{-- <button class="btn btn-danger" data-toggle="modal" data-target="#modalHapusJurusan{{$j->id}}"><i class="bx bxs-trash delete"></i></button> --}}
                </td>
            </tr>
            <!-- Modal Edit Jurusan-->
            <div class="modal fade" id="modalEditJurusan{{$j->id}}" tabindex="-1" aria-labelledby="modalEditJurusanLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modalEditJurusanLabel">Edit Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/properti/'.$j->id.'/update')}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <input type="text" class="form-control" name="jurusan" id="jurusan" value="{{$j->jurusan}}" required>
                                @if ($errors->has('jurusan'))
                                <p style="color: red;">{{$errors->first('jurusan')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>

            {{-- Modal Delete Jurusan--}}
            <div class="modal fade" id="modalHapusJurusan{{$j->id}}" tabindex="-1" aria-labelledby="modalHapusBarang" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-body">
            <h4 class="text-center">Apakah anda yakin?</h4>
            </div>
            <div class="modal-footer">
            <form action="{{url('/deleteProperti/'.$j->id)}}" method="post">
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
        </table>
    </div>

    <div id="kelas">
        <br><br>
        <h3>Data Kelas</h3>
        <table id="data-kelas" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1?>
                @foreach ($kelases as $k)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$k->kelas}}</td>
                    <td class="text-center">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditKelas{{$k->id}}"><i class="bx bxs-edit edit"></i></button>
                        {{-- <button class="btn btn-danger" data-toggle="modal" data-target="#modalHapusKelas{{$k->id}}"><i class="bx bxs-trash delete"></i></button> --}}
                    </td>
                </tr>
                <!-- Modal Edit Kelas-->
                <div class="modal fade" id="modalEditKelas{{$k->id}}" tabindex="-1" aria-labelledby="modalEditKelasLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="modalEditKelasLabel">Edit Kelas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('/properti/kelas/'.$k->id.'/update')}}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <input type="text" class="form-control" name="kelas" id="kelas" value="{{$k->kelas}}" required>
                                    @if ($errors->has('kelas'))
                                    <p style="color: red;">{{$errors->first('kelas')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>

                {{-- Modal Delete Kelas--}}
                <div class="modal fade" id="modalHapusKelas{{$k->id}}" tabindex="-1" aria-labelledby="modalHapusKelas" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-body">
                <h4 class="text-center">Apakah anda yakin?</h4>
                </div>
                <div class="modal-footer">
                <form action="{{url('/deleteProperti/kelas/'.$k->id)}}" method="post">
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

    <br><br>
    <h3>Data Matpel</h3>
    <table id="data-matpel" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Matpel</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1?>
            @foreach ($matpels as $m)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$m->nama_matpel}}</td>
                <td class="text-center">
                    <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditMatpel{{$m->id}}"><i class="bx bxs-edit edit"></i></button>
                    {{-- <button class="btn btn-danger" data-toggle="modal" data-target="#modalHapusMatpel{{$m->id}}"><i class="bx bxs-trash delete"></i></button> --}}
                </td>
            </tr>
            <!-- Modal Edit Kelas-->
            <div class="modal fade" id="modalEditMatpel{{$m->id}}" tabindex="-1" aria-labelledby="modalEditMatpelLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modalEditMatpelLabel">Edit Mata Pelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/properti/matpel/'.$m->id.'/update')}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="nama_matpel">Mata Pelajaran</label>
                                <input type="text" class="form-control" name="nama_matpel" id="nama_matpel" value="{{$m->nama_matpel}}" required>
                                @if ($errors->has('matpel'))
                                <p style="color: red;">{{$errors->first('nama_matpel')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>

            {{-- Modal Delete Matpel--}}
            <div class="modal fade" id="modalHapusMatpel{{$m->id}}" tabindex="-1" aria-labelledby="modalHapusMatpel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-body">
            <h4 class="text-center">Apakah anda yakin?</h4>
            </div>
            <div class="modal-footer">
            <form action="{{url('/deleteProperti/matpel/'.$m->id)}}" method="post">
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


    
  
  <!-- Modal Jurusan-->
  <div class="modal fade" id="addjurusan" tabindex="-1" aria-labelledby="addjurusanLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addjurusanLabel">Tambah Juurusan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{url('/properti/add')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Masukan nama Jurusan">
                </div>
                @if ($errors->has('jurusan'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$errors->first('jurusan')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <script type="text/javascript">
                    @if ($errors->has('jurusan'))
                        $('#addjurusan').modal('show');
                    @endif
                </script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Kelas-->
  <div class="modal fade" id="addkelas" tabindex="-1" aria-labelledby="addkelasLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addkelasLabel">Tambah Kelas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{url('/properti/kelas/add')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Masukan Tingkatan Kelas">
                </div>
                @if ($errors->has('kelas'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{$errors->first('kelas')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <script type="text/javascript">
                    @if ($errors->has('kelas'))
                        $('#addkelas').modal('show');
                    @endif
                </script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Matpel-->
  <div class="modal fade" id="addmatpel" tabindex="-1" aria-labelledby="addmatpelLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addmatpelLabel">Tambah Mata Pelajaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{url('properti/matpel/add')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_matpel">Nama Mata Pelajaran</label>
                    <input type="text" class="form-control" name="nama_matpel" id="nama_matpel" placeholder="Masukan nama Mata Pelajaran">
                </div>
                @if ($errors->has('nama_matpel'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{$errors->first('nama_matpel')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <script type="text/javascript">
                    @if ($errors->has('nama_matpel'))
                        $('#addmatpel').modal('show');
                    @endif
                </script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>

@endsection

