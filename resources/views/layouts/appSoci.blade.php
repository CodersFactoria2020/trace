<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>traCE - Àrea privada de soci</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
    <link rel="shortcut icon" href="ico/favicon.png" />

      <!-- css -->
    <link href="https://fonts.googleapis.com/css?family=Handlee|Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap-responsive.css" rel="stylesheet" />
    <link href="css/flexslider.css" rel="stylesheet" />
    <link href="css/prettyPhoto.css" rel="stylesheet" />
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
>
    <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">
    
<!-- style -->
    <style>
      .topbar,h1,h2 {
        color: #efca30;
      }
      .logoutbtn {
      background-color: red;
      margin: 10 px;
      padding: 20 px;
    }
    .logouticon {
      background-color: red;
      margin: 10 px;
      padding-left: 10 px;
    }
  </style>
  
</head>

<body>

<!-- class="sticky-wrapper is-sticky" style="height: 70px; -->
<div id="header-sticky-wrapper">
    <div id="topbar" class="d-none d-lg-block">
        <div class="container d-flex align-items-center justify-content-between">
          <div>
              <img src="img/Logo-transparent_w96px_INVERT_no-small-text.png" alt="logo de la associació Trace"/>
          </div>
          <div class="contact-info">
            <h1>Hola, {{Auth::User()->first_name}}!</h1>
          </div>

          <div class="social-links">
            <h2>Aquesta es la teva àrea privada!</h2>
          </div>

          <div class=logoutbtn>
            <a href="{{ route('logout') }}" target="_blank" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="logouticon icofont-logout"></i><h5> Tancar sessió</h5></a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
        </div>
    </div>

</header>

    <main class="">
        @yield('content')
    </main>

</body>

<!-- Vendor JS Files -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/php-email-form/validate.js"></script>
<script src="vendor/jquery-sticky/jquery.sticky.js"></script>

<!-- Template Main JS File -->
<script src="js/main.js"></script>

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</html>
