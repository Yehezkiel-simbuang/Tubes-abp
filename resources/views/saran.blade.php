<!DOCTYPE html>
<html>
<head>
    <title>Saran</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/stylesheet3.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>

    <!-- <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"> -->

    <style>
        .spasi{height: 100px; width: 100%;}
        .navbar{background-color: rgba(218, 150, 53, 0.5);}
        .btnlg{
            background:rgba(218, 150, 53, 0.3); border-radius: 10px; letter-spacing: 1px;
            font-weight: bold; color:white; font-size: 100%; width: fit-content;
            border: none;box-shadow: -2px 2px 3px rgba(73, 45, 6, 0.5);
            text-shadow: 1px -1px 3px rgb(45, 46, 82, 0.4);
        }
        .edit{
            width: 70%; background-color: rgba(218, 150, 53, 0.4); padding: 10px; margin:auto;
            max-width: 550px; color: white;
        }
        .inp{border-radius: 0px; border: none; border-radius: 3px;opacity: 85%;}
        .form-row{padding:10px}
        .kirim{
            border:none; background-color: rgba(160, 56, 9, 0.75); color: white;
            border-radius: 3px; padding: 5px; margin-left: 42%;
        }
    </style>
</head>
<body background={{ asset('img/saran.jpeg') }}>
    <nav class="navbar navbar-expand-sm navbar-light" style="text-shadow: 1px 1px 2px rgba(96, 97, 142);">
        <a class="navbar-brand text-white" href="home.html"><img src={{ asset('img/logob.png') }} class="logo mx-1">HIDDEN GEM JOGJA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-haspopup="true" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link text-light" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/saran">Saran</a>
                </li>
                <li class="nav-item dropdown">
                    <button class="nav-link mainmenubtn text-light">Pilihan</button>
                    <div class="dropdown-child">
                        <a href="/wisata">Wisata</a>
                        <a href="/budaya">Budaya</a>
                        <a href="/kuliner">Kuliner</a>
                    </div>
                </li>
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

    <form class="edit" method="POST" action="{{url('saran')}}" enctype="multipart/form-data">
        @csrf
        <center class="fs-1">SARAN</center>
        <div class="form-row">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="inp form-control" id="nama" name='nama' readonly value="{{ Auth::user()->name }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="Namatempat">Nama tempat</label>
                <input type="text" class="inp form-control" id="Namatempat" name='namatempat'>
            </div>
        </div>
        <div class="form-row">
            <label for="alamat">Alamat</label>
            <input type="text" class="inp form-control" id="alamat" name = 'lokasi'>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label class="my-1 mr-2" for="Kategori">Kategori</label><br>
                <select class="inp bg-light" id="Kategori" name="kategori">
                    <option value="Kuliner">Kuliner</option>
                    <option value="Wisata">Wisata</option>
                    <option value="Budaya">Budaya</option>
                </select>
            </div><br>
            <div class="form-group">
                <label for="alasan">Alasan</label>
                <textarea type="text" class="inp form-control" id="alasan" name="alasan"></textarea>
            </div>
        </div>
        <div class="form-row">
            <input type="file" name='file' onchange="preview(event)"/>
        </div><br>
        <button type="submit" class="kirim px-3">Kirim</button>
      </form>

    <div class="spasi"></div>

    <script>
    </script>

    <footer class="text-center text-light bg-opacity-50" style="text-shadow:1px 1px 2px black;background:rgba(218, 150, 53, 0.5);;" width="100%">

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

        <div class="fontt text-center p-1 " style="background-color: rgba(218, 150, 53, 0.5); text-shadow: 2px 2px 3px black;">
          © 2022 Copyright:
          <a class="text-decoration-none text-white" href="https://instagram.com/senzacr">Hidden Gem Jogja</a>
        </div>

    </footer>
</body>
</html>
