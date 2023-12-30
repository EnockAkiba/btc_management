<!DOCTYPE html>
<html lang="en-US">

<head>

    <title>Btc/Agpd</title>
    <meta name="author" content="Graphicfort">
    <meta name="robots" content="index follow">
    <meta name="googlebot" content="index follow">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="../css2?family=Poppins:wght@400;500;600;700;900&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('template/assets/js/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/fonts/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/home.css')}}">

    <!-- <link rel="stylesheet" href="{{asset('template/assets/css/index/red.css')}}"> -->
</head>

<body>


    <div id="main-wrapper">

        <div id="main-container">



            <div id="page-body" class="page-body">

                <div class="row main-row justify-content-center">

                    <div id="primary" class="content-area col-lg-12">

                        <main id="main" class="d-flex justify-items-center align-items-center" style="height:80vh ;width:100%">
                            <div class="container border p-5">
                                <div class="text-center">
                                    <img src="{{ asset('images/logo.png') }}" alt="Logo"  style="width:80px "> 
                                        <h4 class="text-center">Brotherly training center</h4>
                                </div>
                                <h1 class="text-center">Email Verification</h1>
                                <p class="text-center">
                                    Veuillez verifier votre boite mail en
                                    <a href="{{ route('user.verify', $slug) }}">cliquant sur ce lien</a>
                                </p>
                            </div>

                        </main>
                    </div>
                </div>


            </div>

        </div>
    </div>

    <script src="{{asset('template/assets/js/vendor/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('template/assets/js/vendor/jquery/jquery-ui.min.js')}}"></script>
    <script src="{{asset('template/assets/js/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>