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
    @include('custom.message')
  <div class="dashboard-right-side">
    <div class="float-left">
      <h2>Gestió de l'Equip</h2>
    </div>
    {{-- @can('create') --}}
    <button type="button" class="cta" data-toggle="modal" data-target="#create-team">Afegir un membre de l'equip</button>
    @include('team.create')
            {{-- @endcan --}}
  </div>
    <!-- Contenido que se desee -->
  <div class="dashboard-right-side">
    <table class="table table-striped table-borderless">
      <thead class="thead text-uppercase">
        <tr>
          <td><small><b>ID</b></small></td>
          <td><small><b>Imatge</b></small></td>
          <td><small><b>Nom i Cognom</b></small></td>
          <td><small><b>Professio</b></small></td>
          <td colspan="2"><small><b>Accions</b></small></td>
        </tr>
      </thead>
      @foreach($teams as $team)
      @can('view-any', $team)
      <tr>
        <td>{{$team->id}}</td>
        <td class="dashboard-team"><img src="{{$team->get_photo_url()}}"></td>
        <td class="icon-text">
          <a style="color:white" data-toggle="modal" data-target="#show-team{{$team->id}}" class="primary-green" type="button">
          <i class="icofont-user-alt-3"></i>
          {{$team->first_name}}, {{$team->last_name}}
          @include('team.show')
          </a>
        </td>
        <td>{{$team->position}}</td>
        <td class="actions">
            @can('update', $team)
            <a href="" data-toggle="modal" data-target="#edit-team{{$team->id}}" class="primary-green" type="button">
            <i class="icofont-ui-edit"></i>
            </a>
            @include('team.edit')
            @endcan
        </td>
        <td class="actions danger">
            @can('destroy', $team)
            <a href="" data-toggle="modal" data-target="#destroy-team{{$team->id}}" class="danger" type="button">
            <i class="icofont-ui-delete"></i>
            </a>
            @include('team.destroy')
            @endcan
        </td>
      </tr>
      @endcan
      @endforeach

    </table>
  </div>
</div>

@endsection
