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

@section('content')
    @include('custom.message')
    <div class="card col-12">
        <div class="card-header">
            <div class="float-left"><h2>Gestió d'àreas</h2></div>
            @if (auth()->user()->role_id === "Admin")
            <button type="button" class="mybtn btn btn-primary float-right" data-toggle="modal" data-target="#create-category"> Afegir una àrea</button>
            @endif
        </div>

        <table class="table table-striped">
            <thead class="thead">
                <tr>
                    <td><h5>ID</h5></td>
                    <td><h5>Nom de l'àrea</h5></td>
                    <td><h5>Descripció de l'àrea</h5></td>
                    <td colspan="3"><h5>Accions</h5></td>
                </tr>
            </thead>

            @foreach($categories as $category)
                @can('view-any', $category)
                    <tr>
                        <td>{{$category->id ?? 'Default'}} </td>
                        <td>{{$category->name ?? 'Default'}}</td>
                        <td>{{$category->description ?? 'Default'}}</td>
                        <td>
                            @can('update', $category)
                                <a style="color:white" data-toggle="modal" data-target="#edit-category{{$category->id ?? 'Default'}}" class="mybtn btn btn-warning" category="button">Editar</a>
                                @include('category.edit')
                            @endcan
                        </td>
                        <td>
                            <a style="color:white" data-toggle="modal" data-target="#show-category{{$category->id ?? 'Default'}}" class="mybtn btn btn-info" category="button">Detalls</a>
                            @include('category.show')
                        </td>
                        <td>
                            @can('destroy', $category)
                                <a style="color:white" data-toggle="modal" data-target="#destroy-category{{$category->id ?? 'Default'}}" class="mybtn btn btn-danger" category="button">Esborrar</a>
                                @include('category.destroy')
                            @endcan
                        </td>
                    </tr>
                @endcan
            @endforeach
        </table>
    </div>
@endsection

@include('category.create')
@include('category.show')
@include('category.edit')
@include('category.destroy')
