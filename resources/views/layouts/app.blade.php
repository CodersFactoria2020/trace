<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>traCE</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../resources/img/favicon.png" rel="icon">
    <link href="resources/img/apple-touch-icon.png" rel="apple-touch-icon">

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

    <!-- LARAVEL -->
    <!-- CSRF Token -->
    <!-- Scripts -->

</head>

<body>

    <section id="topbar" class="d-none d-lg-block">
        <div class="container d-flex align-items-center">
            <div class="contact-info mr-auto">
              <i class="icofont-phone"></i> <a href="tel:+349332503636">933 250 3636</a>
              <i class="icofont-envelope"></i><a href="mailto:info@tracecatalunya.org">info@tracecatalunya.org</a>
            </div>
            <div class="d-flex align-items-center justify-content-end social-links">
              <p>Segueix-nos:</p>
              <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
              <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
              <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
              <a href="#" class=""><i class="icofont-youtube"></i></a>
            </div>
        </div>
    </section>

    <header id="header">
      <div class="container d-flex justify-content-between align-items-center">

        <div class="mr auto">
          <h1 class=""><a href="">traCE</a></h1>
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>
        <div>
          <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li class="active"><a href="">Inici</a></li>
              <li><a href="">Dany Cerebral</a></li>
              <li class="drop-down"><a href="#">Coneix-nos</a>
                <ul>
                  <li><a href="">Qui som i què fem</a></li>
                  <li><a href="">Filosofia</a></li>
                  <li><a href="">Equip</a></li>
                  <li><a href="">Transparència</a></li>
                </ul>
              </li>
              <li><a href="">Col·laboradors</a></li>
              <li><a href="">Recursos</a></li>
              <li><a href="">Contacte</a></li>
            </ul>
          </nav>
        </div>
        <div class="">
          <a href="" class="cta">Col·labora</a>
        </div>

      </div>
    </header>

    <main class="">
        @yield('content')
    </main>
   
</body>

<footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-6 col-md-12 footer-links">
        <div class="logo mr-auto">
          <h1 class="text-light"><a href=""><span>traCE</span></a></h1>
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>
      </div>

      <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-end footer-info">
        <div class="social-links">
          <p>Segueix-nos:</p>
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class=""><i class="bx bxl-youtube"></i></a>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="container">
  <div class="copyright">
    &copy;2020 Associació Catalana de Traumàtics Cranioencefàlics i Dany Cerebral. All Rights Reserved.
  </div>
  
</div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</html>
