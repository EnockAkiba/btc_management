<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BTC/AGAPD</title>
    <link href="{{asset('images/logo.png')}}" rel="shortcut icon" type="image/png">


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>

    @vite('resources/css/app.css')

    @yield('styles')

</head>
<body class="hold-transition login-page">
<div class="login-box  md:w-2/4">
    <!-- /.login-logo -->
   
        <div class="login-logo flex justify-center items-center m-6">
            <a href="{{route('home')}}"> 
      
                <span class=" ">Brothely Training Center</span>
        </div>
        <div class="card border-t-2 border-t-green-400">
        @yield('content')
    </div>
</div>
<!-- /.login-box -->

@vite('resources/js/app.js')
<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}" defer></script>

<script>
        window.addEventListener('alert', ({
            detail: {
                success
            }
        }) => {
            Toastify({
                text: success,
                close: true,
                backgroundColor: "#4CAF50",
                duration: 3000
            }).showToast();
        })

        @if (session('success'))
            Toastify({
                text: "{{ session('success') }}",
                close: true,
                backgroundColor: "#4CAF50",
                duration: 3000
            }).showToast();
        @endif

        @if (session('error'))
            Toastify({
                text: "{{ session('error') }}",
                close: true,
                backgroundColor: "#f44336",
                duration: 3000
            }).showToast();
        @endif

        @if (session('info'))
            Toastify({
                text: "{{ session('message') }}",
                close: true,
                backgroundColor: "#2196F3",
                duration: 3000
            }).showToast();
        @endif

        @if (session('warning'))
            Toastify({
                text: "{{ session('warning') }}",
                close: true,
                backgroundColor: "#ffeb3b",
                duration: 3000
            }).showToast();
        @endif

        @if ($errors->any())
            Toastify({
                text: "{{ $errors->first() }}",
                close: true,
                backgroundColor: "#f44336",
                duration: 3000
            }).showToast();
        @endif
    </script>
</body>
</html>
