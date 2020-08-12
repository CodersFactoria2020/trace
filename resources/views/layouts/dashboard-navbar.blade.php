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

    <style>
      body {
        margin: 0;
        padding-top: 10px
      }

      .sidebar {
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: #f1f1f1;
        position: fixed;
        height: 100%;
        overflow: auto;
      }

      .sidebar a {
        display: block;
        color: black;
        padding: 16px;
        text-decoration: none;
      }
      
      .sidebar a.active {
        background-color: #3c8760;
        color: white;
      }

      .sidebar a:hover:not(.active) {
        background-color: #efca30;
        color: black;
      }

      div.content {
        margin-left: 200px;
        padding: 1px 16px;
        height: 1000px;
      }

      @media screen and (max-width: 700px) {
        .sidebar {
          width: 100%;
          height: auto;
          position: relative;
        }
        .sidebar a {float: left;}
        div.content {margin-left: 0;}
      }

      @media screen and (max-width: 400px) {
        .sidebar a {
          text-align: center;
          float: none;
        }
      }
      .panelHeader {
        background-color: #3c8760;
        color: white !important;
      }
      .logoutbtn {
        background-color: red;
        margin: 10 px;
        padding-left: 10 px;
      }
      .logouticon {
        background-color: red;
        margin: 10 px;
        padding-left: 10 px;
      }
    </style>

@yield('scripts')

</head>

<body>

  <div class="sidebar">
    <a class="panelHeader">Panell d'administració</a>
    <br> 
    <a href="/dashboard">Inici</a>
    <a href="/user">Usuaris</a>
    <a href="/activity">Activitats</a>
    <a href="/category">Àreas</a>
    <a href="/workplans">Plans de treball</a>
    <a href="/team">Equip de gestió</a>
    <br>
    <div class=logoutbtn>
      <a href="{{ route('logout') }}" target="_blank" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();"><i class="logouticon icofont-logout"></i> Tancar sessió</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
  </div>

    <main class="py-4">
      <div class="container">
        @yield('content')
      </div>
    </main>

</body>

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</html>
