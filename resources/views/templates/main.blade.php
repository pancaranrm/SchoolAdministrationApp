<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- boxicon --}}
    <link href='{{asset('assets/boxicons-2.0.7/css/boxicons.min.css')}}' rel='stylesheet'>
    {{-- css --}}
    <link rel="icon" href="{{asset('assets/images/logo.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/detail.css')}}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <title>@yield('title')</title>
</head>

<body>
    <div class="nav_top no-print">
        <div class="name_app">
            <i class="bx bx-menu mr-2 d-lg-none d-xl-none" id="btn-show-sidebar"></i>
            Data Siswa Guru
        </div>
        <div class="btn-group">
            <div class="dropdown user_profile">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{asset('assets/images/userprofile.png')}}" class="profile" alt="">
                    <div class="user_name d-none d-lg-block">{{session('name')}}</div>
                </button>

                <div class="dropdown-menu dropdown-menu-right mt-2">
                    <a href="{{route('logout')}}" class="dropdown-item w-100 d-flex justify-content-between align-items-center"
                        type="button">
                        <span>Keluar</span>
                        <i class='bx bx-log-out'></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar no-print">
        <div class="logo_content">
            <div class="logo">
                <img src="{{asset('assets/images/logo.png')}}" alt="logoOndek">
                <div class="logo_name" style="text-transform: capitalize">{{session('name')}}</div>
            </div>
            <i class='bx bx-menu d-none d-lg-block' id="btn"></i>
        </div>
        <ul class="nav_list">
            <li>
                <a href="{{url('/')}}" class="nav_link">
                    <i class='bx bxs-tachometer'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{url('/siswa')}}" class="nav_link">
                    <i class='bx bxs-book'></i>
                    <span class="links_name">Siswa</span>
                </a>
            </li>
            <li>
                <a href="{{url('/guru')}}" class="nav_link">
                    <i class='bx bxs-book-bookmark'></i>
                    <span class="links_name">Guru</span>
                </a>
            </li>
            <li>
                <a href="{{url('/export/siswa')}}" class="nav_link">
                    <i class='bx bxs-file-export'></i>
                    <span class="links_name">Export</span>
                </a>
            </li>
        </ul>
    </div>
    
    <div class="content_page no-print">
        @yield('content')
    </div>

    
    {{-- js bootstap --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>


    @yield('script')
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/tabledata.js')}}"></script>
    <script src="{{asset('assets/js/modalData.js')}}"></script>
</body>

</html>