@extends('templates.main')

@section('title','Tambah Data Guru')

@section('content')
    <form action="{{url('guru/edit/'.$guru->id)}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" class="form-control" class="form-control" name="nip" id="nip" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="{{$guru->nip}}">
            @if ($errors->has('nip'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{$errors->first('nip')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
        
        <div class="form-group">
        <label for="nama_guru">Nama Guru</label>
        <input type="text" class="form-control" name="nama_guru" id="nama_guru" value="{{$guru->nama_guru}}">
        @if ($errors->has('nama_guru'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{$errors->first('nama_guru')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        </div>
        
        <label for="">Jenis Kelamin</label><br>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="jenis_kelamin_guru" name="jenis_kelamin_guru" class="custom-control-input" value="Laki-Laki" {{$guru->jenis_kelamin_guru == 'Laki-Laki' ? 'checked' : ''}}>
            <label class="custom-control-label" for="jenis_kelamin_guru">Laki-Laki</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="jenis_kelamin_guru2" name="jenis_kelamin_guru" class="custom-control-input" value="Perempuan" {{$guru->jenis_kelamin_guru == 'Perempuan' ? 'checked' : ''}}>
            <label class="custom-control-label" for="jenis_kelamin_guru2">Perempuan</label>
        </div>
        @if ($errors->has('jenis_kelamin_guru'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{$errors->first('jenis_kelamin_guru')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        
        <div class="form-group mt-3">
        <label for="tempat_lahir_guru">Tempat Lahir</label>
        <input type="text" class="form-control" name="tempat_lahir_guru" id="tempat_lahir_guru" value="{{$guru->tempat_lahir_guru}}">
        @if ($errors->has('tempat_lahir_guru'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{$errors->first('tempat_lahir_guru')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        </div>

        <div class="form-group">
        <label for="tgl_lahir_guru">Tanggal Lahir</label>
        <input type="date" class="form-control" name="tgl_lahir_guru" id="tgl_lahir_guru" value="{{$guru->tgl_lahir_guru}}">
        @if ($errors->has('tgl_lahir_guru'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{$errors->first('tgl_lahir_guru')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        </div>

        <label for="foto">Foto Guru</label>
        <div class="custom-file">
            <input type="file" name="foto" class="custom-file-input" id="foto">
            <label class="custom-file-label" for="foto">Pilih file</label>
        </div>
        @if ($errors->has('foto'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{$errors->first('foto')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="form-group mt-3">
        <label for="id_matpel">Mata Pelajaran</label>
        <select class="form-control" name="id_matpel" id="id_matpel">
            <option value="">--Pilih Mata Pelajaran--</option>
            @foreach ($matpels as $item)
                <option value="{{$item->id}}" {{$guru->matpel['id'] == $guru->id_matpel ? 'selected' : ''}}>{{$item->nama_matpel}}</option>
            @endforeach
        </select>
        @if ($errors->has('id_matpel'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{$errors->first('id_matpel')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        </div>

        <button class="btn btn-primary" role="button" type="submit">Edit</button>

    </form>
@endsection