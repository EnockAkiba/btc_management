<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KongoPanoramique</title>
    <link href="{{asset('images/logoCinema.png')}}" rel="shortcut icon" type="image/png">


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    @vite('resources/css/app.css')

    @yield('styles')

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo flex justify-center">
        <a href="/"> <img src="{{ asset('images/logoCinema.png') }}" alt="Logo" class="brand-image "
            style=" height: 40px;"> </a>
            <span>KongoPanoramique</span>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        @yield('content')
    </div>
</div>
<!-- /.login-box -->

@vite('resources/js/app.js')
<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}" defer></script>
</body>
</html>
