<!DOCTYPE html>
<html>
<head>
    <title>Tambahkan Artikel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/stylesheet2.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>

    <!-- <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"> -->

    <style>
        .spasi{height: 100px; width: 100%;}
        .navbar{background-color: rgba(125, 138, 255, 0.5);}
        .welc{
            background-color: rgba(125, 138, 255, 0.5);width: 100%; background-attachment: fixed;
            height: 150px; margin: auto; vertical-align: middle; text-align: center; color: white;
        }
        .btnlg{
            background:rgba(39, 47, 117, 0.5);; border-radius: 10px; letter-spacing: 1px;
            font-weight: bold; color:white; font-size: 100%; width: fit-content;
            border: none;box-shadow: -2px 2px 3px rgba(73, 45, 6, 0.5);
            text-shadow: 1px -1px 3px rgb(45, 46, 82, 0.4);
        }
        .konten{
            width: 85%; height: fit-content; background-color: rgba(134, 134, 134, 0.5);
            margin:auto; max-width: 600px;
        }
        form .inp {background-color: rgba(255, 255, 255, 0.6); border-radius: 3px; border:none;}
        .konten table {color:white; margin: auto; width: 80%;}
        .konten table td tr{border: 1px black solid;}
        .konten table tr th{text-align: center; vertical-align: middle;height: 100px;}
        .konten table tr td .btnx{
            background-color: rgba(255, 255, 255, 0.6); padding: 5px; border: none;
            border-radius: 3px; border: 1px rgba(255, 255, 255, 0.6) solid;
        }
        .konten table tr td .btnx:hover{
            background-color: rgba(53, 53, 53, 0.5); border: 1px white solid;
            text-shadow: 2px 2px 2px black; color: white;
        }
    </style>
</head>
<body background={{ asset('img/artike.jpeg') }}>
    <nav class="navbar navbar-expand-sm navbar-light" style="text-shadow: 1px 1px 2px rgba(96, 97, 142);">
        <a class="navbar-brand text-white" href="/home"><img src={{ asset('img/logob.png') }} class="logo mx-1">HIDDEN GEM JOGJA</a>
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

    <form class="konten" method="POST" action="{{route('create')}}" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <th class="fs-1">ARTIKEL <p></p></th>
            </tr>
            <tr>
                <td>
                    Nama
                    <p><input type="text" class="inp form-control" name='nama'></p>
                </td>
            </tr>
            <tr>
                <td>
                    Kategori
                    <p>
                      <select class="inp bg-light" id="Kategori" name="kategori">
                            <option value="Kuliner">Kuliner</option>
                            <option value="Wisata">Wisata</option>
                            <option value="Budaya">Budaya</option>
                      </select>
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    Uraian
                    <p><textarea type="text" class="inp form-control" name='uraian'></textarea></p>
                </td>
            </tr>
            <tr>
                <td>
                    Isi
                    <p><textarea type="text" class="inp form-control" name='isi'></textarea></p>
                </td>
            </tr>
            <tr>
                <td>
                    Jam Operasi
                    <p><input type="text" class="inp form-control" name="jamoperasi"></p>
                </td>
            </tr>
            <tr>
                <td>
                    Alamat
                    <p><input type="text" class="inp form-control" name='alamat'></p>
                </td>
            </tr>
            <tr>
                <td>
                    Nomor Telepon / HP
                    <p><input type="text" class="inp form-control" name='no_telp'></p>
                </td>
            </tr>
            <tr>
                <td>
                    Upload Background
                    <p><input type="file" class="upload" accept="Image/*" id="bg" name='gambarbackground'/></p>
                </td>
            </tr>
            <tr>
                <td>
                    Upload Gambar
                    <p><input type="file" class="upload" accept="Image/*" id="gambar" name='gambar'/></p>
                </td>
            </tr>
            <tr>
                <td><p></p></td>
            </tr>
            <tr>
                <td><center>
                <button type="submit" class="btnx px-3 m-5">Kirim</button>
                </td></center>
            </tr>
        </table>
    </form>

    <div class="spasi"></div>

    <script>
    </script>

    <footer class="text-center text-light bg-opacity-50" style="text-shadow:1px 1px 2px black;background:rgba(96, 140, 61, 0.5);" width="100%">

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

        <div class="fontt text-center p-1 " style="background-color: rgba(21, 147, 0, 0.8); text-shadow: 2px 2px 3px black;">
          © 2022 Copyright:
          <a class="text-decoration-none text-white" href="https://instagram.com/senzacr">Hidden Gem Jogja</a>
        </div>

    </footer>
</body>
</html>
