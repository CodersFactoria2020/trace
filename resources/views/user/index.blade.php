@extends('layouts.dashboard-navbar')

@section('scripts')

  <!-- Bootstrap CSS --  SI SE QUITA ESTE ENLACE, EL BOTÓN PRIMARY TOMA FONDO VERDE-->
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
    .mybtn {
        height: 2.4rem !important;
        width: auto !important;
        font-size: 1.4rem !important;
    }
  </style>

@section('content')

    <div class="card col-12">
        <div class="card-header">
            <div class="float-left"><h1>Gestió d'usuaris</h1></div>
            {{-- @can('create') --}}
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#create-user"> Afegir un usuari</button>
            {{-- @endcan --}}
        </div>
    <!-- Contenido que se desee -->
    <table class="table table-triped">
      <thead class="thead">
          <tr>
            <td><h3>ID</h3></td>
            <td><h3>Nom</h3></td>
            <td><h3>Cognom</h3></td>
            <td><h3>Email</h3></td>
{{--                         <td><h3>Telèfon</h3></td>
            <td><h3>DNI</h3></td>
            <td><h3>Tutor</h3></td> --}}
            <td><h3>Rol</h3></td>
            <td colspan="3"><h3>Accions</h3></td>
        </tr>
    </thead>

    @foreach($users as $user)
    @can('view-any', $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->first_name}}</td>
        <td>{{$user->last_name}}</td>
        <td>{{$user->email}}</td>
{{--                     <td>{{$user->phone}}</td>
        <td>{{$user->dni}}</td>
        <td>{{$user->tutor}}</td> --}}
        <td>{{$user->role_id}}</td>
        
        <td>
            <a href="mailto:{{$user->email}}?subject=Assumpte...&body=Hola, {{$user->first_name}}!" target="_blank" 
              style='font-size:2rem' class="mybtn btn btn-dark btn-lg">  <i class=' fas fa-envelope'></i>
            </a>
        </td>
        <td>
              @can('update', $user)
              <a style="color:white" data-toggle="modal" data-target="#edit-user{{$user->id}}" class="btn btn-info" user="button">Editar</a>
              @include('user.edit')
              @endcan
          </td>
          <td>
              <a style="color:white" data-toggle="modal" data-target="#show-user{{$user->id}}" class="btn btn-info" user="button">Detalls</a>
              @include('user.show')
          </td>
          <td>      
              @can('destroy', $user)
              <a style="color:white" data-toggle="modal" data-target="#destroy-user{{$user->id}}" class="btn btn-danger" user="button">Esborrar</a>
              @include('user.destroy')
              @endcan
          </td>
      </tr>
      @endcan
      @endforeach

  </table>
    </div>

@endsection
@include('user.create')
@include('user.edit')
@include('user.show')
@include('user.destroy')
