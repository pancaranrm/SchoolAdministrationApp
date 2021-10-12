<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Mengupdate Jurusan</h3>
    <form action="{{url('/properti/'.$jurusan->id.'/update')}}" method="POST">
        @csrf
        <label for="jurusan">Jurusan</label>
        <input type="text" name="jurusan" id="jurusan" value="{{$jurusan->jurusan}}">
        @if ($errors->has('jurusan'))
            <p style="color: red;">{{$errors->first('jurusan')}}</p>
        @endif
        <button type="submit">Submit</button>
    </form>
</body>
</html>