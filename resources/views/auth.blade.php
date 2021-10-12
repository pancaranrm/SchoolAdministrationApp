<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="{{asset('assets\css\login.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="auth">
        <div class="wrap">
            <img src="{{asset('assets/images/logo.png')}}" alt="SMKN 1 depok" class="logo-auth">
            <div class="auth-title">
                <h5>Data Siswa Guru</h5>
            </div>
            <div class="content-auth">
                <form action="{{route('auth')}}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="username">
                    @if ($errors->has('name'))
                        <p style="color: red;">{{$errors->first('name')}}</p>
                    @endif
                    <input type="password" name="password" placeholder="password">
                    @if ($errors->has('password'))
                        <p style="color: red;">{{$errors->first('password')}}</p>
                    @endif
                    @if (session('pesan'))
                    <div class="alert alert-danger" role="alert">
                        {{session('pesan')}}
                    </div>
                    @endif

                    <button type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
</body>
</html>