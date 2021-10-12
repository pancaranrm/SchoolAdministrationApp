<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Mengupdate Matpel</h3>
    <form action="{{url('/properti/matpel/'.$matpel->id.'/update')}}" method="POST">
        @csrf
        <label for="nama_matpel">matpel</label>
        <input type="text" name="nama_matpel" id="nama_matpel" value="{{$matpel->nama_matpel}}">
        @if ($errors->has('matpel'))
            <p style="color: red;">{{$errors->first('nama_matpel')}}</p>
        @endif
        <button type="submit">Submit</button>
    </form>
</body>
</html>