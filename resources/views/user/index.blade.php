@extends('layouts.dashboard-navbar')
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style>
    .mybtn {
        height: 3rem !important;
        width: auto !important;
        font-size: 1.4rem !important;
    }
    </style>

</head>
@section('content')
    <div class="container">
        <div class="card col-12">
            <div class="card-header">
                <h1>USUARIS REGISTRATS</h1><hr>
                <button type="button" class="mybtn btn btn-primary" data-toggle="modal" data-target="#create-user">Afegir un usuari</button>
                @include('user.create')
                <a href="{{Route('dashboard')}}" class="mybtn btn btn-secondary">Panel de control</a>
            </div>
            <table class="table table-triped">
                <thead>
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
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
{{--                     <td>{{$user->phone}}</td>
                    <td>{{$user->dni}}</td>
                    <td>{{$user->tutor}}</td> --}}
                    <td>{{implode (",", $user->actualRoles())}}</td>
                    
                    <td>
                        <a href="#" style="color:white" class="mybtn btn btn-dark btn-lg">
                            <span class="glyphicon glyphicon-envelope"></span> 
                          </a>
                    </td>
                    <td>
                        <a style="color:white" data-toggle="modal" data-target="#edit-user{{$user->id}}" class="mybtn btn btn-info" user="button">Editar</a>
                        @include('user.edit')
                    </td>
                    <td>
                        <a style="color:white" data-toggle="modal" data-target="#show-user{{$user->id}}" class="mybtn btn btn-info" user="button">Detalls</a>
                        @include('user.show')
                    </td>
                    <td>      
                        <a style="color:white" data-toggle="modal" data-target="#destroy-user{{$user->id}}" class="mybtn btn btn-danger" user="button">Esborrar</a>
                        @include('user.destroy')
                    </td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection
@include('user.show')
@include('user.destroy')
