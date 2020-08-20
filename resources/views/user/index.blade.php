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
  <div class="dashboard-right-side">
    <div class="float-left"><h2>Usuaris</h2></div>
    
    @if (auth()->user()->role_id === "Admin")
    <button type="button" class="cta" data-toggle="modal" data-target="#create-user"> Afegir un usuari</button>
    @endif
  </div>
  <!-- REVISAR CON CLIENTE SI ES NECESARIO ORDEN ASC Y DESC -->
  <div class="filter-views">
    <div class="float-left">
      <!-- {{ request()->is('home') ? 'active' : ''}} -->
      <a href="/user" class="btn btn-outline-dark btn-sm active">Veure tots</a>
      <a href="/user?role_id=1" class="btn btn-outline-dark btn-sm">Soci</a>
      <a href="/user?role_id=2" class="btn btn-outline-dark btn-sm">Professional</a>
      <a href="/user?role_id=3" class="btn btn-outline-dark btn-sm">Admin</a>
      
    </div>
    <div class="float-right d-flex align-items-center">
      <small class="pr-2">Ordenar per cognom:</small>
      <!-- {{ request()->is('home') ? 'active' : ''}} -->
      <div>
        <a href="{{ route('user.index', ['role_id' => request('role_id'), 'sort' => 'asc']) }}" class="btn btn-outline-dark btn-sm active">Ascendent</a>
        <a href="{{ route('user.index', ['role_id' => request('role_id'), 'sort' => 'desc']) }}" class="btn btn-outline-dark btn-sm">Descendent</a>
      </div>

    </div>
  </div>
  <!-- TABLA -->
  <div class="dashboard-right-side">
    <table class="table table-striped table-borderless">
      <thead class="thead text-uppercase">
          <tr>
            <td><small><b>Nom i cognom</b></small></td>
            <td><small><b>Rol</b></small></td>
            <td><small><b>E-mail</b></small></td>
            <td colspan="2"><small><b>Accions</b></small></td>
        </tr>
      </thead>

      @foreach($users as $user)
      @can('view-any', $user)
      
      <tr>
        <td class="icon-text">
          <div class="primary">
            <a href="" data-toggle="modal" data-target="#show-user{{$user->id}}" class="primary" user="button">
            <i class="icofont-user-alt-3"></i>
            {{$user->first_name}} {{$user->last_name}}
            </a>
        </div>
            @include('user.show')
        </td>
        <td>{{$user->role_id}}</td>    
        <td class="icon-text">
          <div class="primary">
            <a href="mailto:{{$user->email}}?subject=Assumpte...&body=Hola, {{$user->first_name}}!" target="_blank" class="primary">
              <i class="icofont-send-mail" style="font-size:24px"></i>
              {{$user->email}}
            </a>
          </div>
        </td>    
        <td class="actions">
          @can('update', $user)
          <div class="primary">
            <a  href="" data-toggle="modal" data-target="#edit-user{{$user->id}}" class="primary" user="button">
              <i class="icofont-ui-edit"></i>
            </a>
          </div>
          @include('user.edit')
          @endcan
        </td>

        <td class="actions ">      
          @can('destroy', $user)
          <div class="danger">
            <a href="" data-toggle="modal" data-target="#destroy-user{{$user->id}}" class="danger" user="button">
              <i class="icofont-ui-delete"></i>
            </a>
          </div>
          @include('user.destroy')
          @endcan
        </td>
      </tr>
      @endcan
      @endforeach
    </table>
  </div>
  <!-- PAGINADO -->
  <div class="dashboard-right-side d-flex align-items-center justify-content-end">
    <div class=""><small>Mostrant {{ count($users) }} de {{ $users->total() }}</small></div>
    <div class=""> {{ $users->links() }}</div>
  </div>
</div>

@endsection
@include('user.create')
@include('user.edit')
@include('user.show')
@include('user.destroy')