<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
{{--    <!-- plugin css for this page -->
    <link
        rel="stylesheet"
        href="./assets/vendors/mdi/css/materialdesignicons.min.css"
    />
    <link rel="stylesheet" href="./assets/vendors/aos/dist/aos.css/aos.css" />
    <link
        rel="stylesheet"
        href="./assets/vendors/owl.carousel/dist/assets/owl.carousel.min.css"
    />
    <link
        rel="stylesheet"
        href="./assets/vendors/owl.carousel/dist/assets/owl.theme.default.min.css"
    />
    --}}
    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="/logo.svg" />
    <!-- inject:css -->
{{--    <link rel="stylesheet" href="assets/css/style.css">--}}
    <!-- endinject -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    @vite([
        'resources/css/client/style.css',
    ])
</head>

<body>
<div class="container-scroller">
    <div class="main-panel">
        <header id="header">
            <div class="container">
                <!-- partial:partials/_navbar.html -->
                @include('layouts.client.partials.navbar')
{{--                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="d-flex justify-content-between align-items-center navbar-top">
                        <ul class="navbar-left">
                            <li>Wed, March 4, 2020</li>
                            <li>30°C,London</li>
                        </ul>
                        <div>
                            <a class="navbar-brand" href="#"
                            ><img src="assets/images/logo.svg" alt=""
                                /></a>
                        </div>
                        <div class="d-flex">
                            <ul class="navbar-right">
                                <li>
                                    <a href="#">ENGLISH</a>
                                </li>
                                <li>
                                    <a href="#">ESPAÑOL</a>
                                </li>
                            </ul>
                            <ul class="social-media">
                                <li>
                                    <a href="#">
                                        <i class="mdi mdi-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="mdi mdi-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="mdi mdi-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="mdi mdi-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="mdi mdi-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="navbar-bottom-menu">
                        <button
                            class="navbar-toggler"
                            type="button"
                            data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div
                            class="navbar-collapse justify-content-center collapse"
                            id="navbarSupportedContent"
                        >
                            <ul
                                class="navbar-nav d-lg-flex justify-content-between align-items-center"
                            >
                                <li>
                                    <button class="navbar-close">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link active" href="index.html">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/world.html">World</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/author.html">Magazine</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/news-post.html">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/business.html">Business</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/sports.html">Sports</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/art.html">Art</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/politics.html">Politics</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/real-estate.html">Real estate</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/travel.html">Travel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="mdi mdi-magnify"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>--}}

                <!-- partial -->
            </div>
        </header>
        <div class="container">
            @yield('content')
        </div>
        <!-- main-panel ends -->
        <!-- container-scroller ends -->

        <!-- partial:partials/_footer.html -->
        @include('.layouts.client.partials.footer')
        {{--<footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="border-top"></div>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <ul class="footer-vertical-nav">
                            <li class="menu-title"><a href="pages/news-post.html">News</a></li>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="pages/world.html">World</a></li>
                            <li><a href="pages/author.html">Magazine</a></li>
                            <li><a href="pages/business.html">Business</a></li>
                            <li><a href="pages/politics.html">Politics</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <ul class="footer-vertical-nav">
                            <li class="menu-title"><a href="pages/world.html">World</a></li>
                            <li><a href="pages/sports.html">Sports</a></li>
                            <li><a href="pages/art.html">Art</a></li>
                            <li><a href="#">Magazine</a></li>
                            <li><a href="pages/real-estate.html">Real estate</a></li>
                            <li><a href="pages/travel.html">Travel</a></li>
                            <li><a href="pages/author.html">Author</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <ul class="footer-vertical-nav">
                            <li class="menu-title"><a href="#">Features</a></li>
                            <li><a href="#">Photography</a></li>
                            <li><a href="#">Video</a></li>
                            <li><a href="pages/news-post.html">Newsletters</a></li>
                            <li><a href="#">Live Events</a></li>
                            <li><a href="#">Stores</a></li>
                            <li><a href="#">Jobs</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <ul class="footer-vertical-nav">
                            <li class="menu-title"><a href="#">More</a></li>
                            <li><a href="#">RSS</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">User Agreement</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="pages/aboutus.html">About us</a></li>
                            <li><a href="pages/contactus.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="d-flex justify-content-between">
                            <img src="assets/images/logo.svg" class="footer-logo" alt="" />

                            <div class="d-flex justify-content-end footer-social">
                                <h5 class="m-0 font-weight-600 mr-3 d-none d-lg-flex">Follow on</h5>
                                <ul class="social-media">
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-twitter"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div
                            class="d-lg-flex justify-content-between align-items-center border-top mt-5 footer-bottom"
                        >
                            <ul class="footer-horizontal-menu">
                                <li><a href="#">Terms of Use.</a></li>
                                <li><a href="#">Privacy Policy.</a></li>
                                <li><a href="#">Accessibility & CC.</a></li>
                                <li><a href="#">AdChoices.</a></li>
                                <li><a href="#">Advertise with us Transcripts.</a></li>
                                <li><a href="#">License.</a></li>
                                <li><a href="#">Sitemap</a></li>
                            </ul>
                            <p class="font-weight-medium">
                                © 2020 <a href="https://www.bootstrapdash.com/" target="_blank" class="text-dark">@ BootstrapDash</a>, Inc.All Rights Reserved.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>--}}

        <!-- partial -->
    </div>
</div>
<!-- inject:js -->
{{--<script src="assets/vendors/js/vendor.bundle.base.js"></script>--}}
<!-- endinject -->
<!-- plugin js for this page -->
{{--<script src="./assets/vendors/owl.carousel/dist/owl.carousel.min.js"></script>--}}
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
{{--<script src="./assets/js/demo.js"></script>--}}
<!-- End custom js for this page-->

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
@vite([
'resources/js/client/demo.js'
])
</body>
</html>
