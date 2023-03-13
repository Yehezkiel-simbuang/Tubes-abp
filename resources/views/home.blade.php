<!DOCTYPE html>
<html>
<head>
    <title>Beranda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/stylesheet.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>

    <!-- <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"> -->

    <style>
        .box{background:rgba(96, 97, 142, 0.5); width: 95%; height:auto; margin:0px auto; color:white; border-radius: 10px;}
        .spasi{height: 200px; width: 100%;}
        .btnnx{
            background:rgba(96, 97, 142, 0.8); border-radius: 10px; letter-spacing: 1px;
            font-weight: bold; color:white; font-size: 100%; width: fit-content;
            border: none;box-shadow: 1px 1px 1px rgb(41, 42, 77);
        }
        .navbar{background-color: rgba(255, 255, 255, 0.5);}
        .btnlg{
            background:rgba(96, 97, 142, 0.5); border-radius: 10px; letter-spacing: 1px;
            font-weight: bold; color:white; font-size: 100%; width: fit-content;
            border: none;box-shadow: -2px 2px 3px rgb(45, 46, 82, 0.4);
            text-shadow: 1px -1px 3px rgb(45, 46, 82, 0.4);
        }
        .box table tr {height: 180px;}
        .box table tr td img{padding: 3px; min-width: 200px; min-height: 100px;}
        .box table tr td ul{margin: auto; list-style: none;}
        .box table tr td p{margin-bottom: 0px; text-shadow: 1px 1px 1px rgb(41, 42, 77);}
        .formatgambar{border-radius: 10px; padding: 3px; width: 100%; height: 100%;}

    </style>
</head>

<body background={{ asset('img/home3.jpg') }}>
    <nav class="navbar navbar-expand-sm navbar-light" style="text-shadow: 1px 1px 2px rgba(96, 97, 142);">
        <a class="navbar-brand text-white" href="/home"><img src={{ asset('img/logob.png') }} class="logo mx-1">HEYO JOYA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-haspopup="true" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link text-light" href="/home">Home</a>
                </li>
                @can('pengguna-access')
                <li class="nav-item">
                    <a class="nav-link text-light" href="/saran">Saran</a>
                </li>
                @endcan
                <li class="nav-item dropdown">
                    <button class="nav-link mainmenubtn text-light">Pilihan</button>
                    <div class="dropdown-child">
                        <a href=/wisata>Wisata</a>
                        <a href="/budaya">Budaya</a>
                        <a href="/kuliner">Kuliner</a>
                    </div>
                </li>
                @can('admin-access')
                <li class="nav-item">
                    <a class="nav-link text-light" href="/tambah">Tambahkan artikel</a>
                </li>
                @endcan
            </ul>
            @if (Route::has('login'))
                    @auth
                    <a class="btn btnlg mx-2" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btnlg mx-2">Masuk</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btnlg mx-2">Daftar</a>
                        @endif
                    @endauth

        </div>
        @endif
    </nav>

    <div class="spasi"></div>
    <div class="box p-2">
        <table width="100%">
            <!-- <tr>
                <th>PALING POPULER</th>
            </tr> -->
            @foreach($utama as $utamas)
            <tr>
                <td class="gambar"><img src={{ asset('$utamas->gambar') }} class="formatgambar"></td>
                <td class="konten" width="75%">
                    <p class="fw-bold fs-4 mb-1 mx-3" id="judul">{{$utamas->nama}}</p>
                    <p class="mx-3" align="justify">{{$utamas->uraian}}</p>
                    <a href="{{route('detail',[$utamas->id])}}" id="link"><input id="btnlihat" type="button" value="Lihat Selengkapnya    >" class="btnnx p-2 px-3 m-1 mx-3"></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="spasi"></div>

    <script>

    </script>

    <footer class="text-center text-light bg-opacity-50" style="text-shadow:1px 1px 2px black;background:rgba(96, 97, 142, 0.5);" width="100%">

        <div class="container p-4 pb-0">

            <h1>HeYo</h1>
            <p class="fontt">Temukan harta karun tersembunyi di Yogyakarta</p>

            <section class="mb-2 text-light">

                <a class="btn btnicon" href="#!" role="button"><i class="fa fa-facebook-f"></i></a>
                <a class="btn btnicon" href="#!" role="button"><i class="fa fa-twitter"></i></a>
                <a class="btn btnicon" href="#!" role="button"><i class="fa fa-google"></i></a>
                <a class="btn btnicon" href="#!" role="button"><i class="fa fa-instagram"></i></a>

            </section>

        </div>

        <div class="fontt text-center p-1 " style="background-color: rgba(255, 255, 255, 0.3); text-shadow: 2px 2px 3px black;">
          © 2022 Copyright:
          <a class="text-decoration-none text-white" href="https://instagram.com/senzacr">Hidden Gem Jogja</a>
        </div>

    </footer>
</body>
</html>
