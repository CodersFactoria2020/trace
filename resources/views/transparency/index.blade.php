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
@include('custom.message')

<div class="col">
  <div class="dashboard-right-side">
    <div class="float-left"><h2>Informació económica i d’activitats</h2></div>
    {{-- @can('create') --}}
    <button type="button" class="cta" data-toggle="modal" data-target="#create-transparency"> Afegir una activitat economica</button>
    @include('transparency.create')
    {{-- @endcan --}}
    </div>
    <!-- Contenido que se desee -->
    <table class="table table-striped">
      <thead class="thead">
          <tr>
              <td><h5>ID</h5></td>
              <td><h5>Any</h5></td>
              <td><h5>Documentacio Econmica</h5></td>
              <td><h5>Documentacio Economica d'entitats</h5></td>
              <td colspan="3"><h5>Accions</h5></td>
          </tr>
      </thead>

      @foreach($transparencies as $transparency)
      @can('view-any', $transparency)
      <tr>
          <td>{{$transparency->id}}</td>
          <td>{{$transparency->date_name}}</td>
          <td>{{$transparency->get_document_url()}}</td>
          <td>{{$transparency->get_document_url()}}</td>

          <td>
              @can('update', $transparency)
              <a style="color:white" data-toggle="modal" data-target="#edit-transparency{{$transparency->id}}" class="mybtn btn btn-info" transparency="button">Editar</a>
              @include('transparency.edit')
              @endcan
          </td>
          <td>
              <a style="color:white" data-toggle="modal" data-target="#show-transparency{{$transparency->id}}" class="mybtn btn btn-info" transparency="button">Detalls</a>
              @include('transparency.show')
          </td>
          <td>
              @can('destroy', $transparency)
              <a style="color:white" data-toggle="modal" data-target="#destroy-transparency{{$transparency->id}}" class="mybtn btn btn-danger" transparency="button">Esborrar</a>
              @include('transparency.destroy')
              @endcan
          </td>
      </tr>
      @endcan
      @endforeach

  </table>
    </div>

@endsection
