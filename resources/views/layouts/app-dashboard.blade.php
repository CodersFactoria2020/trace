<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>

      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">

      <title>traCE User dashboard</title>
      <meta content="" name="description">
      <meta content="" name="keywords">

      <meta name="csrf-token" content="{{ csrf_token() }}">

      <!-- Favicons -->
      <link href="img/favicon.png" rel="icon">

      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

      <!-- Vendor CSS Files -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="vendor/icofont/icofont.min.css" rel="stylesheet">
      <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="vendor/animate.css/animate.min.css" rel="stylesheet">

      <!-- Template Main CSS File -->
      <link href="css/app.css" rel="stylesheet">

      <!-- Theme skin -->
      {{-- <link href="color/default.css" rel="stylesheet" /> --}}

        <!-- css -->
      <link href="https://fonts.googleapis.com/css?family=Handlee|Open+Sans:300,400,600,700,800" rel="stylesheet">
      {{-- <link href="css/style.css" rel="stylesheet" /> --}}

      <!-- LARAVEL -->
      <!-- CSRF Token -->

      <!-- Scripts -->
      {{-- <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css"> --}}


  @yield('scripts')

  </head>

  <body>
    <div class="container-fluid">
      <div class="row">
        @include('layouts.sidebar')
        @yield('content')
      </div>
  </div>

  </body>

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</html>
