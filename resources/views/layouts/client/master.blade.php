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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@vite([
'resources/js/client/demo.js'
])
</body>
</html>
