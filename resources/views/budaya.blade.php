<!DOCTYPE html>
<html>
<head>
    <title>Budaya Untukmu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/stylesheet2.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>

    <style>
        .box{background:rgba(214, 174, 95, 0.5); width: 95%; height:auto; margin:0px auto; color:white; border-radius: 10px;}
        .btnlg{
            background:rgba(255, 255, 255, 0.5); border-radius: 10px; letter-spacing: 1px;
            font-weight: bold; color: white; font-size: 100%; width: fit-content;
            border: none;box-shadow: -2px 2px 3px rgb(45, 46, 82, 0.4);
            text-shadow: 2px -2px 3px rgb(45, 46, 82, 0.4);
        }
        .Judul{
            background:rgba(214, 174, 95, 0.5); width: 50%; height:auto; left:0;
            color:white; border-bottom-right-radius: 10px; border-top-right-radius: 10px;
            text-align: center; padding: 10px; letter-spacing: 2px; text-shadow: 2px 2px 2px black;
        }
        .spasi{height: 150px; width: 100%;}
        .gambar{width: 20%; height: 10%;}
        .navbar{background-color: rgba(214, 174, 95, 0.5);}
        .card{background-color: rgba(222, 130, 44, 0.5);}
    </style>
</head>
<body background={{ asset('img/budaya.jpg') }}>
    <nav class="navbar navbar-expand-sm navbar-light"  style="text-shadow: 1px 1px 2px rgba(96, 97, 142);">
        <a class="navbar-brand text-white" href="/home"><img src={{ asset('img/logob.png') }} class="logo mx-1">HIDDEN GEM JOGJA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-haspopup="true" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
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

    <div class="Judul fw-bold fs-3">Budaya Untukmu</div> <div class="spasi"></div>

    <div class="box p-3">
        <div class="row ms-auto">
          @foreach($budaya as $budayas)
            <div class="col-md-3 col-sm-4 col-lg-4 mb-4">
                <div class="card">
                    <a href="{{route('budayadetail',[$budayas->id])}}" style="text-align: center;"><img src={{ asset('img/luwengsampang.jpg') }} class="formatgambar card-img-top"></a>
                    <a href="{{route('budayadetail',[$budayas->id])}}" class="text-decoration-none">
                    <div class="card-body pt-2 text-light">
                        <div class="card-title"><h4>{{$budayas->nama}}</h4></div>
                        {{$budayas->alamat}}
                    </div></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="spasi"></div>

    <script>

    </script>
    <footer class="text-center text-light bg-opacity-50" style="text-shadow:1px 1px 2px black;background:rgba(214, 174, 95, 0.6);" width="100%">

        <div class="container p-4 pb-0">

            <h1>HeYo</h1>
            <p class="fontt">Temukan harta karun tersembunyi di Yogyakarta</p>
            <section class="mb-2">

                <a class="btn btnicon" href="#!" role="button"><i class="fa fa-facebook-f"></i></a>
                <a class="btn btnicon" href="#!" role="button"><i class="fa fa-twitter"></i></a>
                <a class="btn btnicon" href="#!" role="button"><i class="fa fa-google"></i></a>
                <a class="btn btnicon" href="#!" role="button"><i class="fa fa-instagram"></i></a>

            </section>

        </div>

        <div class="fontt text-center p-1 " style="background-color: rgba(214, 174, 95, 0.8); text-shadow: 2px 2px 3px black;">
          © 2022 Copyright:
          <a class="text-decoration-none text-white" href="https://instagram.com/senzacr">Hidden Gem Jogja</a>
        </div>

    </footer>
</body>
</html>
