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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Theme style -->

    <link rel="stylesheet" href="{{ asset('admin/asset/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/toastify/toastify.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css">

    @yield('styles')
    @vite('resources/css/app.css')

</head>
<style>
    a {
        text-decoration: none;
    }

    .nav-link {
        color: darkblue;
    }
</style>

<body class="hold-transition layout-top-nav ">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md  p-0 border-none">
            <div class="flex justify-between w-full ">
                <a href="{{ route('home') }}" class="ml-4 brand-link flex items-start">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 40px;">
                    <!-- <span class="title text-sm">BTC</span> -->
                </a>
                <div class="flex justify-between items-center  ">

                    @if(collect(Auth::user()->registers)->isNotEmpty())
                    <li class="ml-auto list-none mx-3 text-blue-500 bg-gray-50 p-2 rounded-full">

                        <a class=" ml-auto" href="{{ route('applay') }}">
                            <i class="fa-solid fa-book"></i>
                        </a>
                    </li>
                    @endif

                    @if(
                    collect(Auth::user()->teachers)->isNotEmpty() or
                    Auth::user()->roleUser == 2 or
                    Auth::user()->roleUser == 1 or
                    collect(Auth::user()->registers)->isNotEmpty()

                    )
                    <li class="ml-auto list-none mx-3 text-blue-500 bg-gray-50 p-2 rounded-full">

                        <a class=" ml-auto" href="{{route('message')}}">
                            <i class="fa-solid fa-comment"></i>
                        </a>
                    </li>
                    @endif
                    <li class="d-lg-none d-md-none ml-auto list-none mx-3 text-blue-500 bg-gray-50 p-2 rounded-full">

                        <a class=" ml-auto" data-toggle="modal" data-target="#navigation" href="#" role="button">
                            <i class="fa-solid fa-bars"></i>
                        </a>
                    </li>
                </div>


            </div>
        </nav>
        <!-- /.navbar -->

        {{-- NAVIGATION MODAL  --}}

        <div class="modal fade" id="navigation">
            <div class="modal-dialog modal-md">
                <div class="modal-content rounded-none shadow-none  border-t-2 border-t-blue-800 p-2">
                    <div class="flex justify-between items-center">
                        <h3 class=" card-title text-blue">
                            <a href="" class=" brand-link flex items-center">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-image">
                                <span class="title">BTC/AGAPD</span>
                            </a>
                        </h3>
                        <button type="button" class="btn-deleted p-2 ml-auto " data-dismiss="modal"><i class="fa-solid fa-x"></i></button>
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
            <div class="b box-menu" style=" min-height: auto; max-height:90vh; overflow:hidden;">

                <section class="content bg-white">
                    <div class="row">
                        <div class="bg-white items-center px-4 col-md-1 d-none d-lg-flex d-md-flex mt-0" style="height:92vh; overflow:hidden">

                            <div class="content">

                                <div class="img relative mx-2 mb-4">
                                    @if(Auth::user()->picture)
                                    <a href="{{route('profile.show')}}">
                                        <img src="{{ asset('/' . Auth::user()->picture) }}" class="rounded-full mx-2 border-2 " style="width:40px; height:40px">
                                        <span class="bg-green-500 w-4 h-4 absolute rounded-full top-0 right-3 border-2 border-white"></span>
                                    </a>
                                    @else
                                    <a href="{{route('profile.show')}}">
                                        <img src="{{ asset('/images/user.png')}}" class="rounded-full mx-2 border-2 " style="width:40px; height:40px">
                                        <span class="bg-green-500 w-4 h-4 absolute rounded-full top-0 right-3 border-2 border-white"></span>
                                    </a>
                                    @endif
                                </div>
                                <div class="mx-2 py-4 border-2 border-blue-50 bg-white rounded-full shadow-sm hover:translate-x-1 hover:transition-all">

                                    <ul class="nav  flex-column">

                                        @if(
                                        collect(Auth::user()->teachers)->isNotEmpty() or
                                        Auth::user()->roleUser == 2 or
                                        Auth::user()->roleUser == 1 or
                                        collect(Auth::user()->registers)->isNotEmpty()

                                        )
                                        <li class="nav-item active">
                                            <a href="{{ route('news') }}" class="nav-link">
                                                <i class="fas fa-home" title="Actualités"></i>
                                            </a>
                                        </li>
                                        @endif



                                        @if(collect(Auth::user()->teachers)->isNotEmpty())
                                        <li class="nav-item ">
                                            <a href="{{ route('quiz') }}" class="nav-link">
                                                <i class="fas fa-book" title="Devoirs"></i>

                                            </a>
                                        </li>
                                        @endif

                                        @if (Auth::user()->roleUser == 2)

                                        <li class="nav-item ">
                                            <a href="{{ route('promotion') }}" class="nav-link">
                                                <i class="fas fa-box" title="Extension"></i>
                                            </a>
                                        </li>

                                        <li class="nav-item ">
                                            <a href="{{route('user')}}" class="nav-link">
                                                <i class="fas fa-users" title="users"></i>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ route('register_user') }}" class="nav-link">
                                                <i class="fas fa-pen" title="register"></i>
                                            </a>
                                        </li>

                                        @elseif(Auth::user()->roleUser == 1)
                                        <li class="nav-item ">
                                            <a href="{{route('user')}}" class="nav-link">
                                                <i class="fas fa-users" title="users"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('register_user') }}" class="nav-link">
                                                <i class="fas fa-pen" title="register"></i>
                                            </a>
                                        </li>
                                        @endif
                                        <li class="nav-item">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    <i class="mr-2 fa fa-sign-out-alt "></i>
                                                </a>
                                            </form>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class=" col-md-11 sm:pe-0 md:pe-4 lg:pe-4 main">
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
    @livewireScripts

    <!-- jQuery -->
    <script src="{{ asset('admin/asset/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('admin/asset/js/dropzone/min/dropzone.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('admin/asset/dist/js/adminlte.min.js') }}"></script>

    {{-- @vite('resources/js/app.js') --}}


    <script src="{{ asset('admin/toastify/toastify.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/js/dist/mdb5/plugins/standard/multi-carousel.min.js">
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

        @if(session('success'))
        Toastify({
            text: "{{ session('success') }}",
            close: true,
            backgroundColor: "#4CAF50",
            duration: 3000
        }).showToast();
        @endif

        @if(session('error'))
        Toastify({
            text: "{{ session('error') }}",
            close: true,
            backgroundColor: "#f44336",
            duration: 3000
        }).showToast();
        @endif

        @if(session('info'))
        Toastify({
            text: "{{ session('message') }}",
            close: true,
            backgroundColor: "#2196F3",
            duration: 3000
        }).showToast();
        @endif

        @if(session('warning'))
        Toastify({
            text: "{{ session('warning') }}",
            close: true,
            backgroundColor: "#edc45a",
            duration: 3000
        }).showToast();
        @endif
    </script>
</body>

</html>