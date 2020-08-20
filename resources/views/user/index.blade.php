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


@section('content')

    <div class="col">
      <div class="card-header">
          <div class="float-left"><h2>Gestió d'usuaris </h2></div>
          <div class="float-left" style="margin: .8rem 0 0 .8rem;"><p>(Mostrant {{ count($users) }} de {{ $users->total() }})</p></div>
          <div class="float-left" class="sr-only" style="padding: 0 2rem;"> {{ $users->links() }}</div>
          @if (auth()->user()->role_id === "Admin")
          <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#create-user"> Afegir un usuari</button>
          @endif
        </div>
    <!-- Contenido que se desee -->
    <table class="table table-striped">
      <div class="col-12">
        <div class="col-6 float-left">
          <h6 style="display:inline-block;margin:10 5 15;">Mostrar només:</h6>
          <a href="/user?role_id=1" class="btn btn-outline-primary btn-sm">Soci</a> |
          <a href="/user?role_id=2" class="btn btn-outline-primary btn-sm">Professional</a> |
          <a href="/user?role_id=3" class="btn btn-outline-primary btn-sm">Admin</a> |
          <a href="/user" class="btn btn-outline-primary btn-sm">Cap filtre</a>
        </div>
        <div class="col-6 float-right">
          <h6 style="display:inline-block;margin:10 5 0;">Ordenar per cognom:</h6>
          <a href="{{ route('user.index', ['role_id' => request('role_id'), 'sort' => 'asc']) }}" class="btn btn-outline-primary btn-sm">Ascendent</a> |
          <a href="{{ route('user.index', ['role_id' => request('role_id'), 'sort' => 'desc']) }}" class="btn btn-outline-primary btn-sm">Descendent</a>
        </div>
      </div>
      <thead class="thead">
          <tr>
            <td><h5>ID</h5></td>
            <td><h5>Nom i cognom</h5></td>
            <td><h5>E-mail</h5></td>
            <td><h5>Rol</h5></td>
            <td colspan="3"><h5>Accions</h5></td>
        </tr>
    </thead>

    @foreach($users as $user)
    @can('view-any', $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->first_name}} {{$user->last_name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->role_id}}</td>        
        <td colspan="3">
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