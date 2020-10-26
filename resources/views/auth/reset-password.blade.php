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
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-6 col-12 order-md-1 order-2">
                    <div class="pl-4 py-4">
                        <h1 class="mb-3 text-18 text-md-left text-center">Forget Password</h1>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col">
                                    <input id="email" type="email" readonly class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md">
                                    <button type="submit" class="btn btn-block btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-md-6 col-12 order-md-2 order-1 text-center "
                     style="padding: 2rem 2rem 2rem 0;">
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
