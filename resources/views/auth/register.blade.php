<!DOCTYPE html>
<html>
<head>
    <title>Registrasi HeYo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/stylesheet.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        *{ text-decoration: none; margin: 0px; padding: 0px;}
        .box{ height: 80px; width: 100%; top: 0; left: 0; right: 0;}

    </style>
</head>
<body background={{ asset('img/bglogin.jpg') }} width="100%" height="100%">
    <div class="box"></div>
    <table width="400px" class="stabel">
        <th class="p-4">
            <img src={{ asset('img/logob.png') }} alt="" width="130px">
        </th>
        <tr >
            <td class="p-4 pt-0" width="50%">
              <form method="POST" action="{{ route('register') }}">
                  @csrf
                <h6>Username</h6>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <h6>Email address</h6>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="new-email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <h6>Password</h6>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <h6>Konfirmasi Password</h6>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <div class="text-danger" id="tidakvalid"></div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
                </form>
            </td>
        </tr>
        <tr height="20px"></tr>
    </table>
</body>
</html>
