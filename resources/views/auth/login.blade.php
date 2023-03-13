<!DOCTYPE html>
<html>
<head>
    <title>Login HeYo</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/stylesheet.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .box{ height: 100px; width: 100%; top: 0; left: 0; right: 0;}
        .format{
            margin-inline-start: 10%; letter-spacing: 2px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .BG{
            border-radius: 60px; display: flex; list-style: none; width:60%; height: auto;
            background:rgba(46, 160, 205, 0.8); box-shadow: gray;
        }
        .BG .format{color: white;}
        .BG .format:hover{color: rgb(46, 160, 205); text-decoration: none;}
        .BG:hover{background: white; color: rgb(46, 160, 205); border: rgb(46, 160, 205) 1px solid ;}
        .BG ul{ display: block; }
        .stabel tr td a{color: black; font-weight: 7px; text-decoration: none;}
        .stabel tr td a:hover{text-decoration: underline;}
    </style>
</head>

<body background={{ asset('img/bglogin.jpg') }} width="100%" height="100%">
    <div class="box"></div>
    <table width="600px" class="stabel">
        <th class="p-4">
            <img src={{ asset('img/logob.png') }} width="130px">
        </th>
        <tr >
            <td class="p-4 pt-0" width="50%">
              <form method="POST" action="{{ route('login') }}">
                  @csrf

                  <div class="row mb-3">
                      <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                      <div class="col-md-6">
                          <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                      <div class="col-md-6">
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                      <div class="col-md-6 offset-md-4">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                              <label class="form-check-label" for="remember">
                                  {{ __('Remember Me') }}
                              </label>
                          </div>
                      </div>
                  </div>

                  <div class="row mb-0">
                      <div class="col-md-8 offset-md-4">
                          <button type="submit" class="btn btn-primary">
                              {{ __('Login') }}
                          </button>

                          @if (Route::has('login'))
                              <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                  @auth
                                      <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                                  @endauth
                              </div>
                          @endif
                      </div>
                  </div>
              </form>
            </td>
            <td align="center" class="p-2 pt-0 border-start border-secondary">
                <section class="BG">
                    <a href="home.html"><img class="" src={{ asset('img/google.png') }} width="60"></a>
                    <a class="format mx-auto mt-3 fs-5 fw-bold" href="/home">Google</a>
                </section>
            </td>
        </tr>
        <tr height="20px"></tr>
    </table>
</body>
</html>
