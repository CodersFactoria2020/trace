@extends('layouts.dashboard-navbar')

@section('scripts')

  <!-- Bootstrap CSS -->
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
  <!-- Font Awesome CSS -->
  <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>

@endsection

  <!-- Custom  Style -->
  <style>
    html,
    body {
      margin: 0;
      padding: 0;
    }

  </style>

@section('content')

    <div class="card col-12">
        <div class="card-header">
            <div class="float-left"><h1>Gestió d'activitats</h1></div>
            <button type="button" class="mybtn btn btn-primary float-right" data-toggle="modal" data-target="#create-user"> Afegir una activitat</button>
        </div>
    <!-- Contenido que se desee -->
        <div class="card body">
            <a>Provisional !!! membre 1</a>
            <a>Provisional !!! membre 1</a>
        </div>
    </div>

@endsection