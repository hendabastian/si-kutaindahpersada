<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pelayanan Umum</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('quixlab/images/favicon.png')}}">
    <link href="{{asset('quixlab/css/style.css')}}" rel="stylesheet">
</head>

<body class="h-100">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="/">
                                    <h2>PT. KUTA INDAH PERSADA</h2>
                                    <h4>Login</h4>
                                </a>
                                <form class="mt-5 mb-5 login-input" method="POST" action="{{route('login')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" id="email" name="email" class="form-control"
                                               value="{{ old('email') }}" placeholder="Email" required autofocus>
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password"
                                               name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button class="btn login-form__btn submit w-100" type="submit">Sign In</button>
                                </form>
                                <hr>
                            <a href="{{route('register')}}" class="btn btn-block btn-success text-white">Registrasi Akun</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('quixlab/plugins/common/common.min.js')}}"></script>
    <script src="{{asset('quixlab/js/custom.min.js')}}"></script>
    <script src="{{asset('quixlab/js/settings.js')}}"></script>
    <script src="{{asset('quixlab/js/gleek.js')}}"></script>
    <script src="{{asset('quixlab/js/styleSwitcher.js')}}"></script>
</body>

</html>