@extends('templates.main')

@section('title','Edit Data Siswa')

@section('content')
    <form action="{{url('siswa/edit/'.$siswa->id)}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nisn">NISN</label>
            <input type="text" class="form-control" name="nisn" id="nisn" value="{{$siswa->nisn}}" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
            @if ($errors->has('nisn'))
                <p style="color: red;">{{$errors->first('nisn')}}</p>
            @endif
        </div>
        
        <div class="form-group">
            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" value="{{$siswa->nama_siswa}}">
            @if ($errors->has('nama_siswa'))
                <p style="color: red;">{{$errors->first('nama_siswa')}}</p>
            @endif
        </div>

        <label for="">Jenis Kelamin</label><br>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="jenis_kelamin" name="jenis_kelamin" class="custom-control-input" value="Laki-Laki" {{$siswa->jenis_kelamin == 'Laki-Laki' ? 'checked' : ''}}>
            <label class="custom-control-label" for="jenis_kelamin">Laki-Laki</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="jenis_kelamin2" name="jenis_kelamin" class="custom-control-input" value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'checked' : ''}}>
            <label class="custom-control-label" for="jenis_kelamin2">Perempuan</label>
        </div>
        @if ($errors->has('jenis_kelamin'))
            <p style="color: red;">{{$errors->first('jenis_kelamin')}}</p>
        @endif
        
        <div class="form-group mt-3">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="{{$siswa->tempat_lahir}}">
            @if ($errors->has('tempat_lahir'))
                <p style="color: red;">{{$errors->first('tempat_lahir')}}</p>
        @endif
        </div>

        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" value="{{$siswa->tgl_lahir}}">
            @if ($errors->has('tgl_lahir'))
                <p style="color: red;">{{$errors->first('tgl_lahir')}}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="agama">Agama</label>
            <select name="agama" class="form-control" id="agama">
                <option value="">--Pilih Agama--</option>
                <option value="islam" {{$siswa->agama == 'islam' ? 'selected' : ''}}>Islam</option>
                <option value="kristen protestan" {{$siswa->agama == 'kristen protestan' ? 'selected' : ''}}>Keristen Protestan</option>
                <option value="kristen katolik" {{$siswa->agama == 'kristen katolik' ? 'selected' : ''}}>kristen Katolik</option>
                <option value="hindu" {{$siswa->agama == 'hindu' ? 'selected' : ''}}>Hindu</option>
                <option value="buddha" {{$siswa->agama == 'buddha' ? 'selected' : ''}}>Buddha</option>
                <option value="Konghucu" {{$siswa->agama == 'Konghucu' ? 'selected' : ''}}>Konghucu</option>
            </select>
            @if ($errors->has('agama'))
                <p style="color: red;">{{$errors->first('agama')}}</p>
            @endif
        </div>

        <label for="foto">Foto Siswa</label>
        <div class="custom-file">
            <input type="file" name="foto" class="custom-file-input" id="foto" value="{{$siswa->foto}}">
            <label class="custom-file-label" for="foto">Pilih file</label>
        </div>
        @if ($errors->has('foto'))
                <p style="color: red;">{{$errors->first('foto')}}</p>
        @endif

        <div class="form-group">
            <label for="id_jurusan">Jurusan</label>
            <select name="id_jurusan" class="form-control" id="id_jurusan">
                <option value="">--Pilih Jurusan--</option>
                @foreach ($jurusan as $item)
                    <option value="{{$item->id}}" {{$siswa->jurusan['id'] == $item->id ? 'selected' : ''}}>{{$item->jurusan}}</option>
                @endforeach
            </select>
            @if ($errors->has('id_jurusan'))
                <p style="color: red;">{{$errors->first('id_jurusan')}}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="id_kelas">Kelas</label>
            <select name="id_kelas" class="form-control" id="id_kelas">
                <option value="">--Pilih kelas--</option>
                @foreach ($kelas as $item)
                    <option value="{{$item->id}}" {{$siswa->kelas['id'] == $item->id ? 'selected' : ''}}>{{$item->kelas}}</option>
                @endforeach
            </select>
            @if ($errors->has('id_kelas'))
                <p style="color: red;">{{$errors->first('id_kelas')}}</p>
            @endif
        </div>

        <button class="btn btn-primary" role="button" type="submit">Submit</button>

    </form>
@endsection