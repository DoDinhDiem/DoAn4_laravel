<!doctype html>
<html class="no-js" lang="zxx">

<!-- index-431:41-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home Version Four || limupa - Digital Products Store ECommerce Bootstrap 4 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->

    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.png">
    <!-- Material Design Iconic Font-V2.2.0 -->
    <link rel="stylesheet" href="/assets/css/material-design-iconic-font.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <!-- Font Awesome Stars-->
    <link rel="stylesheet" href="/assets/css/fontawesome-stars.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="/assets/css/meanmenu.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="/assets/css/slick.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="/assets/css/animate.css">
    <!-- Jquery-ui CSS -->
    <link rel="stylesheet" href="/assets/css/jquery-ui.min.css">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="/assets/css/venobox.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="/assets/css/nice-select.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <!-- Bootstrap V4.1.3 Fremwork CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <!-- Helper CSS -->
    <link rel="stylesheet" href="/assets/css/helper.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/assets/css/responsive.css  ">
    <!-- Modernizr js -->
    <script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
 <![endif]-->
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">

        @include('trangChu.Layout.Header')

        @yield('contentClient')

        @include('trangChu.Layout.Footer')

    </div>
    <!-- Body Wrapper End Here -->
    <!-- jQuery-V1.12.4 -->
    <script src="/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Popper js -->
    <script src="/assets/js/vendor/popper.min.js"></script>
    <!-- Bootstrap V4.1.3 Fremwork js -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- Ajax Mail js -->
    <script src="/assets/js/ajax-mail.js"></script>
    <!-- Meanmenu js -->
    <script src="/assets/js/jquery.meanmenu.min.js"></script>
    <!-- Wow.min js -->
    <script src="/assets/js/wow.min.js"></script>
    <!-- Slick Carousel js -->
    <script src="/assets/js/slick.min.js"></script>
    <!-- Owl Carousel-2 js -->
    <script src="/assets/js/owl.carousel.min.js"></script>
    <!-- Magnific popup js -->
    <script src="/assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Isotope js -->
    <script src="/assets/js/isotope.pkgd.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="/assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- Mixitup js -->
    <script src="/assets/js/jquery.mixitup.min.js"></script>
    <!-- Countdown -->
    <script src="/assets/js/jquery.countdown.min.js"></script>
    <!-- Counterup -->
    <script src="/assets/js/jquery.counterup.min.js"></script>
    <!-- Waypoints -->
    <script src="/assets/js/waypoints.min.js"></script>
    <!-- Barrating -->
    <script src="/assets/js/jquery.barrating.min.js"></script>
    <!-- Jquery-ui -->
    <script src="/assets/js/jquery-ui.min.js"></script>
    <!-- Venobox -->
    <script src="/assets/js/venobox.min.js"></script>
    <!-- Nice Select js -->
    <script src="/assets/js/jquery.nice-select.min.js"></script>
    <!-- ScrollUp js -->
    <script src="/assets/js/scrollUp.min.js"></script>
    <!-- Main/Activator js -->
    <script src="/assets/js/main.js"></script>
    @if (session('success'))
        <script>
            window.onload = function() {
                alert("{{ session('success') }}");
            };
        </script>
    @endif

</body>

<!-- index-431:47-->

</html>
