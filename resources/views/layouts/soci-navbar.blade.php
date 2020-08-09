<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>traCE</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="vendor/venobox/venobox.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="css/app.css" rel="stylesheet">

    <!-- Theme skin -->
    <link href="color/default.css" rel="stylesheet" />

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png" />
    <link rel="shortcut icon" href="ico/favicon.png" />

    <!-- css -->
    <link href="https://fonts.googleapis.com/css?family=Handlee|Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap-responsive.css" rel="stylesheet" />
    <link href="css/flexslider.css" rel="stylesheet" />
    <link href="css/prettyPhoto.css" rel="stylesheet" />
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />

    <!-- LARAVEL -->
    <!-- CSRF Token -->
    <!-- Scripts -->
    <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">
    
<!-- style -->
<style>
    .headerh2 {
        color: #efca30;
    }
    .logoutContent {
        color: white;
    }
    
</style>

</head>

<body>
    <header>
        <div id="topbar" class="d-none d-lg-block">
            <div class="container d-flex align-items-center justify-content-between">

                <div>
                    <img src="img/Logo-transparent_w96px_INVERT_no-small-text.png" alt="logo de la associació Trace" />
                </div>
                <div class="headerh2">
                    <h2>Àrea privada de {{Auth::User()->first_name}}</h2>
                </div>
                <div class="text-right float-left btn btn-danger">
                    <a href="{{ route('logout') }}" target="_blank" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="logouticon icofont-logout logoutContent"></i>
                        <h5 class="logoutContent float-right"> Tancar sessió </h5>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </header>

    <main class="">

        <div class="container d-flex justify-content-between align-items-center">

            <div class="mr auto">
                <h2 class="">El meu pla de treball</h2>
            </div>

        </div>
        
        @yield('content')
    
    </main>

</body>

<!-- Vendor JS Files -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="vendor/php-email-form/validate.js"></script>
<script src="vendor/jquery-sticky/jquery.sticky.js"></script>
<script src="vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="vendor/counterup/counterup.min.js"></script>
<script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="vendor/venobox/venobox.min.js"></script>

<!-- Template Main JS File -->
<script src="js/main.js"></script>

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</html>
