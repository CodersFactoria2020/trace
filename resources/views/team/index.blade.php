@extends('layouts.dashboard-navbar')

@section('scripts')

  <!-- Jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Bootstrap CSS --  SI SE QUITA ESTE ENLACE, EL BOTÓN PRIMARY TOMA FONDO VERDE-->
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
  <!-- Font Awesome CSS -->
  <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>

  <!-- Bootstrap JS -->
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
            <div class="float-left"><h2>Gestió de Membres de l'Equip</h2></div>
            {{-- @can('create') --}}
            <button type="button" class="mybtn btn btn-primary float-right" data-toggle="modal" data-target="#create-team"> Afegir un membre de l'equip</button>
            @include('team.create')
            {{-- @endcan --}}
        </div>
    <!-- Contenido que se desee -->
    <table class="table table-striped">
      <thead class="thead">
          <tr>
              <td><h5>ID</h5></td>
              <td><h5>Nom i Cognom</h5></td>
              <td><h5>Professio</h5></td>
              <td><h5>Imatge</h5></td>
              <td colspan="4"><h5>Accions</h5></td>
          </tr>
      </thead>
      @foreach($teams as $team)
      @can('view-any', $team)
      <tr>
          <td>{{$team->id}}</td>
          <td>{{$team->first_name}}, {{$team->last_name}}</td>
          <td>{{$team->position}}</td>
          <td> <img src="{{$team->get_photo_url()}}" width="150" height="150"></td>
          <td>
              @can('update', $team)
              <a style="color:white" data-toggle="modal" data-target="#edit-team{{$team->id}}" class="mybtn btn btn-info" type="button">Editar</a>
              @include('team.edit')
              @endcan
          </td>
          <td>
              <a style="color:white" data-toggle="modal" data-target="#show-team{{$team->id}}" class="mybtn btn btn-info" type="button">Detalls</a>
              @include('team.show')
          </td>
          <td>
              @can('destroy', $team)
              <a style="color:white" data-toggle="modal" data-target="#destroy-team{{$team->id}}" class="mybtn btn btn-danger" type="button">Esborrar</a>
              @include('team.destroy')
              @endcan
          </td>
      </tr>
      @endcan
      @endforeach

  </table>
    </div>

@endsection
