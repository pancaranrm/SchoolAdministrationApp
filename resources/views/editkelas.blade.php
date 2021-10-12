<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Mengupdate Kelas</h3>
    <form action="{{url('/properti/kelas/'.$kelas->id.'/update')}}" method="POST">
        @csrf
        <label for="kelas">Kelas</label>
        <input type="text" name="kelas" id="kelas" value="{{$kelas->kelas}}">
        @if ($errors->has('kelas'))
            <p style="color: red;">{{$errors->first('kelas')}}</p>
        @endif
        <button type="submit">Submit</button>
    </form>
</body>
</html>