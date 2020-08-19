@extends('layouts.app-dashboard')

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
    @include('custom.message')
    <div class="card col-12">
        <div class="card-header">
            <div class="float-left"><h2>Gestió d'activitats</h2></div>

            {{-- @can('create') --}}
            <button type="button" class="mybtn btn btn-primary float-right" data-toggle="modal" data-target="#create-activity"> Afegir una activitat</button>
            {{-- @endcan --}}
        </div>
    <!-- Contenido que se desee -->
    <table class="table table-striped">
      <thead class="thead">
          <tr>
              <td><h5>ID</h5></td>
              <td><h5>Títol</h5></td>
              <td><h5>Descripció</h5></td>
              <td><h5>Professional</h5></td>

              <td colspan="3"><h5>Accions</h5></td>
          </tr>
      </thead>

      @foreach($activities as $activity)
      @can('view-any', $activity)
      <tr>
          <td>{{$activity->id}}</td>
          <td>{{$activity->title}}</td>
          <td>{{$activity->description}}</td>
          <td>{{$activity->professional1}}</td>
          <td>
              @can('update', $activity)
              <a style="color:#ffffff" data-toggle="modal" data-target="#edit-activity{{$activity->id}}" class="mybtn btn btn-info" activity="button">Editar</a>
              @include('activity.edit')
              @endcan
          </td>
          <td>
              <a style="color:white" data-toggle="modal" data-target="#show-activity{{$activity->id}}" class="mybtn btn btn-info" activity="button">Detalls</a>
              @include('activity.show')
          </td>
          <td>
              @can('destroy', $activity)
              <a style="color:white" data-toggle="modal" data-target="#destroy-activity{{$activity->id}}" class="mybtn btn btn-danger" activity="button">Esborrar</a>
              @include('activity.destroy')
              @endcan
          </td>
      </tr>
      @endcan
      @endforeach

  </table>
    </div>

@endsection
@include('activity.create')
@include('activity.show')
@include('activity.edit')
@include('activity.destroy')
