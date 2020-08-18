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
    <link
      rel="apple-touch-icon-precomposed"
      sizes="144x144"
      href="ico/apple-touch-icon-144-precomposed.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="114x114"
      href="ico/apple-touch-icon-114-precomposed.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="72x72"
      href="ico/apple-touch-icon-72-precomposed.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      href="ico/apple-touch-icon-57-precomposed.png"
    />
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


</head>

<body>
    <div id="topbar" class="d-none d-lg-block">
        <div class="flex-container d-flex align-items-center justify-content-between">

          <div class="contact-info d-flex align-items-center justify-content-betwee">
              <a href="tel:+349332503636"><i class="icofont-phone"></i>933 250 3636</a>
              <a href="mailto:info@tracecatalunya.org"><i class="icofont-envelope"></i>info@tracecatalunya.org</a>
              <div class="social-links">
                <a href="https://www.facebook.com/danycerebraltrace" target="_blank" class=""><i class="icofont-facebook"></i></a>
                <a href="https://twitter.com/tracecatalunya?lang=es" target="_blank" class=""><i class="icofont-twitter"></i></a>
                <a href="https://www.instagram.com/associaciotrace/" target="_blank" class=""><i class="icofont-instagram"></i></a>
              </div> 
          </div>
          <a class="social-links" href="https://www.youtube.com/channel/UCEXJ-1eKKkl8gqsqOBxy5dg" target="_blank"class=""><i class="icofont-youtube"></i></a>

          <div class="user">
            <a href="{{Route('login')}}" target="_blank" class="cta"><i class="icofont-user-alt-3"></i></i>Àrea usuari</a>
          </div>
        </div>
    </div>

    <div id="header-sticky-wrapper">

      <header id="header" >

        <div class="flex-container d-flex justify-content-between align-items-center">

          <div class="mr auto">
            <a href="{{url('/home')}}">
            <img src="img/Logo_transparente_sin_texto.png" alt="logotipo de traCE" class="img-fluid" style="width:90px; heigh:auto"></a>
          </div>

          <div>
            <nav class="nav-menu d-none d-lg-block">
              <ul>
                <li class="{{ request()->is('home') ? 'active' : ''}}"><a href="{{url('/home')}}">Inici</a></li>
                <li class="{{ request()->is('dany_cerebral') ? 'active' : ''}}"><a href="{{url('/dany_cerebral/')}}">Dany Cerebral</a></li>
                <li class="drop-down {{ request()->is('qui_som','filosofia','equip','transparencia') ? 'active' : ''}}"><a href="#">Coneix-nos</a>
                  <ul>
                    <li ><a href="{{url('/qui_som/')}}">Qui som i què fem</a></li>
                    <li><a href="{{url('/filosofia/')}}">Filosofia</a></li>
                    <li><a href="{{url('/equip/')}}">Equip</a></li>
                    <li><a href="{{url('/transparencia/')}}">Transparència</a></li>
                  </ul>
                </li>
                <li class="{{ request()->is('collaboradors') ? 'active' : ''}}"><a href="{{url('/collaboradors/')}}">Col·laboradors</a></li>
                <li class="{{ request()->is('recursos') ? 'active' : ''}}"><a href="{{url('/recursos/')}}">Recursos</a></li>
                <li class="{{ request()->is('contacte') ? 'active' : ''}}"><a href="{{url('/contacte/')}}">Contacte</a></li>
              </ul>
            </nav>
          </div>

          <div>
            <a href="" class="cta-line">Col·labora</a>
          </div>

        </div>

      </header>

    <div>

    <main class="">
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
