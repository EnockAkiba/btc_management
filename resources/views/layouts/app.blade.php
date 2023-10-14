<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BTC/AGAPED</title>
    <link href="{{ asset('images/logo.png') }}" rel="shortcut icon" type="image/png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Theme style -->

    <link rel="stylesheet" href="{{ asset('admin/asset/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/toastify/toastify.css') }}">

    @yield('styles')

    @vite('resources/css/app.css')

</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white p-0">
            <div class="container flex">
                <a href="{{ route('home') }}" class="brand-link flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-image">
                    <span class="title">BTC/AGAPD</span>
                </a>
                <li class="list-none d-lg-none d-md-none">
                    <a class="nav-link text-black" data-toggle="modal" data-target="#navigation" href="#"
                        role="button">
                        <span class="navbar-toggler-icon"></span>
                    </a>
                </li>

            </div>
        </nav>
        <!-- /.navbar -->

        {{-- NAVIGATION MODAL  --}}

        <div class="modal fade" id="navigation">
            <div class="modal-dialog modal-md">
                <div class="modal-content rounded-none shadow-none  border-t-2 border-t-green-300 p-2">
                    <div class="flex justify-between items-center">
                        <h3 class="card-title text-blue">
                            <a href="" class="brand-link flex items-center">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-image ">
                                <span class="title">BTC/AGAPD</span>
                            </a>
                        </h3>
                        <button type="button" class="btn-deleted p-2 ml-auto " data-dismiss="modal"><i
                                class="fa-solid fa-x"></i></button>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="mt-3">
                        @include('layouts.navbar')

                    </div>
                </div>
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- NAVIGATION MODAL-->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <div class="container box-menu">

                <section class="content">
                    <div class="row">
                        <div class="col-md-3 d-none d-lg-block d-md-block mt-3">
                            <div class="card px-3 py-2">
                                <div class="card-header">
                                    <h3 class="flex title items-center">
                                        <div class="img relative">
                                            @if(Auth::user()->picture)
                                            <img src="{{ asset('/' . Auth::user()->picture) }}"
                                                class="rounded-full mx-2" style="width:40px; height:40px">
                                            <span class="bg-green-500 w-4 h-4 absolute rounded-full top-0 right-1 border-2 border-white"></span>
                                            @endif
                                        </div>
                                        <span> {{ Auth::user()->name }}</span>
                                    </h3>
                                </div>
                                <div class="card-body p-2">
                                    <h3 class=" font-bold mb-2"><i class="fa fa-box text-blue-600 "></i> Actualités & Chat</h3>

                                    <ul class="nav  flex-column">
                                        <li class="nav-item active">
                                            <a href="{{ route('news') }}" class="nav-link">
                                                <i class="fas fa-inbox text-blue-600 text-sm"></i> Actualité
                                            </a>
                                        </li>


                                        <li class="nav-item">
                                            <a href="{{ route('news.create') }}" class="nav-link">
                                                <i class="fa fa-plus text-blue-600 text-sm"></i> Ajouter une Actualité
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ route('message') }}" class="nav-link">
                                                <i class="fa fa-comments text-blue-600 text-sm" aria-hidden="true"></i> Message
                                            </a>
                                        </li>

                                        <h3 class=" font-bold mb-2 mt-3"><i class="fa fa-users text-blue-600 text-sm"></i> </h3>

                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <i class="far fa-circle text-blue-600 text-sm"></i> Equipe
                                            </a>
                                        </li>


                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <i class="far fa-circle text-blue-600 text-sm"></i> Partenaires
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <div class="card card px-3 py-2">
                                <div class="card-header">
                                    <h3 class=" font-bold"> <i class="fa-solid fa-gear text-blue-600 text-sm"></i> Paramétre
                                    </h3>

                                </div>
                                <div class="card-body p-2">
                                    <ul class="nav nav-pills flex-column">

                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <i class="far fa-circle text-blue-600 text-sm"></i> A propos
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <i class="far fa-circle text-blue-600 text-sm"></i>
                                                Slider
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <i class="far fa-circle text-blue-600 text-sm"></i> Contact
                                            </a>
                                        </li>
                                        <h3 class=" font-bold my-2"> Utilisateur</h3>
                                        <li class="nav-item">
                                            <a href="{{ route('profile.show') }}" class="nav-link">
                                                <i class="fa fa-user text-blue-600 text-sm" aria-hidden="true"></i> Mon profi
                                            </a>

                                        </li>

                                        <li class="nav-item">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a href="{{ route('logout') }}" class="nav-link"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                    <i class="mr-2 fa fa-sign-out-alt text-blue-600 text-sm"></i>
                                                    Se deconnecter
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9 content-box ">
                            @yield('content')
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('admin/asset/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('admin/asset/js/dropzone/min/dropzone.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('admin/asset/dist/js/adminlte.min.js') }}"></script>

    {{-- @vite('resources/js/app.js') --}}


    <script src="{{ asset('admin/toastify/toastify.js') }}"></script>

    <!-- Inclure jQuery (avant Bootstrap JavaScript) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script
        src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/js/dist/mdb5/plugins/standard/multi-carousel.min.js">
    </script>

    @yield('scripts')

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
