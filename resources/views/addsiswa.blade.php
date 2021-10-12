@extends('templates.main')

@section('title','Tambah Data siswa')

@section('content')
    <form action="{{url('siswa/add')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nisn">NISN</label>
            <input type="text" class="form-control" name="nisn" id="nisn" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
            @if ($errors->has('nisn'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{$errors->first('nisn')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
        
        <div class="form-group">
            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" value="{{old('nama_siswa')}}">
            @if ($errors->has('nama_siswa'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{$errors->first('nama_siswa')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>

        <label for="">Jenis Kelamin</label><br>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="jenis_kelamin" name="jenis_kelamin" class="custom-control-input" value="Laki-Laki" {{ old('jenis_kelamin')=="Laki-Laki" ? 'checked='.'"checked"' : '' }}>
            <label class="custom-control-label" for="jenis_kelamin">Laki-Laki</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="jenis_kelamin2" name="jenis_kelamin" class="custom-control-input" value="Perempuan" {{ old('jenis_kelamin')=="Perempuan" ? 'checked='.'"checked"' : '' }}>
            <label class="custom-control-label" for="jenis_kelamin2">Perempuan</label>
        </div>
        @if ($errors->has('jenis_kelamin'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{$errors->first('jenis_kelamin')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        
        <div class="form-group mt-3">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="{{old('tempat_lahir')}}">
            @if ($errors->has('tempat_lahir'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{$errors->first('tempat_lahir')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        </div>

        <div class="form-group mt-3">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" value="{{old('tgl_lahir')}}">
            @if ($errors->has('tgl_lahir'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{$errors->first('tgl_lahir')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>

        <div class="form-group">
            <label for="agama">Agama</label>
            <select name="agama" class="form-control" id="agama">
                <option value="">--Pilih Agama--</option>
                <option value="islam" @if (old('agama') == 'islam') selected="selected" @endif>Islam</option>
                <option value="kristen protestan" @if (old('agama') == 'kristen protestan') selected="selected" @endif>Keristen Protestan</option>
                <option value="kristen katolik" @if (old('agama') == 'kristen katolik') selected="selected" @endif>kristen Katolik</option>
                <option value="hindu" @if (old('agama') == 'hindu') selected="selected" @endif>Hindu</option>
                <option value="buddha" @if (old('agama') == 'buddha') selected="selected" @endif>Buddha</option>
                <option value="Konghucu" @if (old('agama') == 'konghucu') selected="selected" @endif>Konghucu</option>
            </select>
            @if ($errors->has('agama'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{$errors->first('agama')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>

        <label for="foto">Foto Siswa</label>
        <div class="custom-file">
            <input type="file" name="foto" class="custom-file-input" id="foto" value="{{old('foto')}}">
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
            <label for="id_jurusan">Jurusan</label>
            <select name="id_jurusan" class="form-control" id="id_jurusan">
                <option value="">--Pilih Jurusan--</option>
                @foreach ($jurusan as $item)
                    <option value="{{$item->id}}" @if (old('id_jurusan') == $item->id) selected="selected" @endif>{{$item->jurusan}}</option>
                @endforeach
            </select>
            @if ($errors->has('id_jurusan'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{$errors->first('id_jurusan')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>

        <div class="form-group">
            <label for="id_kelas">Kelas</label>
            <select name="id_kelas" class="form-control" id="id_kelas">
                <option value="">--Pilih kelas--</option>
                @foreach ($kelas as $item)
                    <option value="{{$item->id}}" @if (old('id_kelas') == $item->id) selected="selected" @endif>{{$item->kelas}}</option>
                @endforeach
            </select>
            @if ($errors->has('id_kelas'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{$errors->first('id_kelas')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>

        <button class="btn btn-primary" role="button" type="submit">Submit</button>

    </form>

@endsection