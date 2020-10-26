<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Pengurusan Perakuan BOMBA</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/styles/css/themes/lite-purple.min.css')}}">
    <style>
        .bg-custom {
            background: #8e9eab; /* fallback for old browsers */
            background: -webkit-linear-gradient(to top, #ced4da, #eef2f3); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to top, #ced4da, #eef2f3); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
    </style>
</head>

<body>
<div class="auth-layout-wrap bg-custom">
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-6 col-12 order-md-1 order-2">
                    <div class="p-4">
                        <h1 class="mb-3 text-18 text-md-left text-center">Log Masuk</h1>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Emel</label>
                                <input id="email"
                                       class="form-control form-control-rounded @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email"
                                       autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Kata laluan</label>
                                <input id="password" type="password"
                                       class="form-control form-control-rounded @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <div class="">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-rounded btn-primary btn-block mt-2">Log masuk</button>

                        </form>
                        @if (Route::has('password.request'))

                            <div class="mt-3 text-center">

                                <a href="{{ route('password.request') }}" class="text-muted"><u>Terlupa kata laluan?</u></a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 col-12 order-md-2 order-1 text-center "
                     style="padding: 2rem;">
                    <img src="{{asset('assets/images/logo.svg')}}" width="175px" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('assets/js/common-bundle-script.js')}}"></script>

<script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>
