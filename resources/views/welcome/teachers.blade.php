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
    <link rel="stylesheet" href="{{asset('template/assets/js/plugins/fancybox/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/js/plugins/mediaelementplayer/css/mediaelementplayer.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/js/plugins/twenty-twenty/css/twentytwenty.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/js/plugins/owl-carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/js/plugins/owl-carousel/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/social-networks/social-networks.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/animate/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/home.css')}}">

    <!-- <link rel="stylesheet" href="{{asset('template/assets/css/index/red.css')}}"> -->
</head>

<body>


    <div id="main-wrapper">

        <div id="main-container">

            <a href="#" id="back-to-top" class="back-to-top" title="Back to top"></a>

            <header class="header-section header-section-fixed">

                <div class="header-section-container">

                    <div class="header-menu-section">

                        <div class="header-menu-section-container">


                            <nav class="navbar navbar-expand-lg">

                                <div class="container gx-4">

                                    <a class="navbar-brand" href="{{route('welcome')}}">
                                        <img src="{{asset('images/logo.png')}}" alt="Bason" class="normal" height="50px">
                                    </a>

                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-wd">MENU</span>
                                        <span class="navbar-toggler-lines-wrapper">
                                            <i class="navbar-toggler-line navbar-toggler-line-top"></i>
                                            <i class="navbar-toggler-line navbar-toggler-line-middle"></i>
                                            <i class="navbar-toggler-line navbar-toggler-line-bottom"></i>
                                        </span>
                                    </button>

                                    <div class="header-menu desktop-menu navbar-collapse">

                                        <ul class="navbar-nav ms-auto">

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('welcome')}}"><span>Accueil</span></a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('blog')}}"><span>Actualites</span></a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="/user/login"><span>Se connecter</span></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="header-menu mobile-menu collapse" id="mobile-menu">
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>

            <div id="page-body" class="page-body">

                <div class="row main-row justify-content-center">

                    <div id="primary" class="content-area col-lg-12">

                        <main id="main" class="content-area-container site-main">



                            <!-- NEWS -->

                            <div id="page-body" class="page-body mt-5">
                                <div class="section-title text-center">

                                    <div class="section-title-container mt-5">

                                        <div class="section-title-body">

                                            <div class="section-title-heading">
                                                <h2>BTC Equipe</h2>
                                            </div>

                                            <div class="hr-divider hr-divider-layout-1 accent-color"></div>


                                        </div>
                                    </div>
                                </div>
                                <!--  equipes  -->
                                <div class="container">
                                    <div class="row">
                                        @foreach($teachers as $teacher)
                                        <div class="col-lg-3">
                                            <div class="main-block boxed-block-2y testimonials-block white-color-bg grey-2-color-border text-center">
                                                <div class="main-block-container testimonials-block-container">
                                                    <div class="main-block-header testimonials-block-header">
                                                        <img src="{{asset('images/team/belin.jpg')}}" alt="Client image" />
                                                    </div>

                                                    <div class="main-block-body testimonials-block-body">
                                                        <div class="main-block-heading testimonials-block-heading">
                                                            <h5 class="name">Belin Mpanga</h5>
                                                            <h6 class="role font-weight-500 accent-color">
                                                                Formateur d'anglais de BTC
                                                            </h6>
                                                        </div>

                                                        <div class="main-block-footer testimonials-block-footer">
                                                            <span class="rate rate-5 rate-2x"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!--  equipes  -->

                            </div>



                        </main>
                    </div>
                </div>


            </div>

            <footer id="colophon" class="footer-section site-footer">

                <div class="footer-section-container">

                    <div class="footer-section-copyright">

                        <div class="main-section">

                            <div class="container gx-4">

                                <div class="row gx-36 align-items-center">

                                    <div class="col-lg-6">

                                        <div class="footer-section-copyright-content light-color text-center text-lg-start">
                                            <p>&copy; <span class="current-year"></span> designed &amp; btc agapd all rights reserved.</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">

                                        <div class="footer-section-copyright-content light-color text-center text-lg-end">

                                            <div class="social-networks social-networks-xs social-networks-layout-1 social-networks-layout-transparent">
                                                <ul>
                                                    <li>
                                                        <a href="#" title="Facebook">
                                                            <i class="fab fa-facebook-f"></i>
                                                            <i class="fab fa-facebook-f"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Twitter">
                                                            <i class="fab fa-twitter"></i>
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="youtube">
                                                            <i class="fab fa-youtube"></i>
                                                            <i class="fab fa-youtube"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Behance">
                                                            <i class="fab fa-behance"></i>
                                                            <i class="fab fa-behance"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Dribbble">
                                                            <i class="fab fa-dribbble"></i>
                                                            <i class="fab fa-dribbble"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{asset('template/assets/js/vendor/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('template/assets/js/vendor/jquery/jquery-ui.min.js')}}"></script>
    <script src="{{asset('template/assets/js/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/animsition/js/animsition.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/appear/jquery.appear.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/countto/jquery.countTo.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/downcount/jquery.downCount.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/fancybox/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/fitvids/jquery.fitvids.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/mediaelementplayer/js/mediaelement-and-player.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/pace/pace.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/parallax/jquery.parallax-1.1.3.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/perfect-scrollbar/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/sticky-sidebar/jquery.sticky-sidebar.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/tweetie/tweetie.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/twenty-twenty/js/twentytwenty.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/typed/typed.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('template/assets/js/scripts.js')}}"></script>
</body>

</html>