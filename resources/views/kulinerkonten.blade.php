<!DOCTYPE html>
<html>
<head>
    <title>Beranda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/stylesheet2.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>

    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
      </svg> -->

    <style>
        @font-face {
            font-family: fontjudul;
            src: url(Simonetta-Black.ttf);
        }
        .navbar{background-color: rgba(0, 0, 0, 1);}
        .btnlg{
            background:rgba(255, 255, 255, 0.635); border-radius: 10px; letter-spacing: 1px;
            font-weight: bold; color:white; font-size: 100%; width: fit-content;
            border: none;box-shadow: -2px 2px 3px rgb(45, 46, 82, 0.4);
            text-shadow: 1px -1px 3px rgb(45, 46, 82, 0.4);
        }
        .bgkonten{
            background-attachment: local; background-repeat: no-repeat; background-position: center; background-size: cover;
            background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),url("airterjun_martin.jpg");
            width: 100%; height: 350px;
        }
        .bgkonten table tr td{color: white; padding: 10px; text-shadow: 2px 2px 3px rgb(0, 0, 0, 0.5);}
        .gambar{width: 60%; height: 100%;border-radius: 25px; max-width: 420px;}
        .spasi{width: 100%; height: 200px;}
        .akhir tr td{text-align: center; padding: 10px;}
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm" style="text-shadow: 1px 1px 2px rgba(96, 97, 142);">
        <a class="navbar-brand text-white" href="/home"><img src={{ asset('img/logoa.png') }} class="logo mx-1">HIDDEN GEM JOGJA</a>
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
                        <a href="/Wisata">Wisata</a>
                        <a href="/Budaya">Budaya</a>
                        <a href="/Kuliner">Kuliner</a>
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
    <div class="bgkonten">
        <table class="m-auto" width="90%">
            <tr>
                <td class="pt-5" style="font-weight: bolder; font-size: 50px;">
                    <center>{{$kuliner->nama}}</center></td>
            </tr>
            <tr>
                <td class="pt-0">
                    <p style="font-size: 18px;"><center>
                        {{$kuliner->uraian}}</center>
                    </p>
                </td>
            </tr>
        </table>
    </div>

    <div class="container p-3" style="margin-top:100px; width:fit-content;">
        <div class="col">
            <p align="justify" class="px-3" style="font-size: 22px;">
              {{$kuliner->isi}}
        </div>
    </div>

    <div class="spasi"></div>

    <table class="akhir m-auto" width="80%">
        <tr>
            <td width="30%"><i class="fa fa-clock-o fs-1"></i></td>
            <td width="40%"><i class="fa fa-home fs-1"></i></td>
            <td width="30%"><i class="fa fa-phone fs-1"></i></td>
        </tr>
        <tr>
            <td>{{$kuliner->jamoperasi}} </td>
            <td>{{$kuliner->alamat}} </td>
            <td>{{$kuliner->no_telp}}</td>
        </tr>
    </table>

    <div class="spasi"></div>

    <footer class="text-center text-light bg-opacity-50" style="text-shadow:1px 1px 2px black;background:rgba(0, 0, 0, 0.8);" width="100%">

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

        <div class="fontt text-center p-1 " style="background-color: black; text-shadow: 2px 2px 3px black;">
          © 2022 Copyright:
          <a class="text-decoration-none text-white" href="https://instagram.com/senzacr">Hidden Gem Jogja</a>
        </div>

    </footer>
</body>
</html>
