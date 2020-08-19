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

    <div class="card col-12">
        <div class="card-header">
            <div class="float-left"><h2>Equip de gestió de l'associació</h2></div>
            <!-- Cambiar el data-target de la modal -->
            <button type="button" class="mybtn btn btn-primary float-right" data-toggle="modal" data-target="#create-user"> Afegir un membre</button>
        </div>
    <!-- Contenido que se desee -->
        <div class="card body">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('team.create') }}"> Nou membre</a>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>Nom i Cognom</th>
                    <th>Professio</th>
                    <th>Imatge</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($teams as $team)
                    <tr>
                        <td>{{$team->first_name}}, {{$team->last_name}}</td>
                        <td>{{ $team->position }}</td>
                        <td> <img src="{{$team->get_photo_url()}}" width="150" height="150"></td>
                        <td>
                            <form action="{{ route('team.destroy',$team->id) }}" method="POST">
        
                                <a class="btn btn-info" href="{{ route('team.show',$team->id) }}">Show</a>
        
                                <a class="btn btn-primary" href="{{ route('team.edit',$team->id) }}">Edit</a>
        
                                @csrf
                                @method('DELETE')
        
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>

@endsection