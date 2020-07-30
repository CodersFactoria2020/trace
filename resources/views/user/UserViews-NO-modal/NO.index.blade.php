@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>USUARIS REGISTRATS</h1><hr>
                <a href="{{Route('user.create')}}" class="btn btn-secondary">Afegir usuari</a>
                <a href="{{Route('home')}}" class="btn btn-secondary">Tornar al inici</a>
            </div>
            <table class="table table-triped">
                <thead>
                    <tr>
                        <td><h3>ID</h3></td>
                        <td><h3>Nom</h3></td>
                        <td><h3>Cognom</h3></td>
                        <td><h3>Email</h3></td>
                        <td><h3>Telèfon</h3></td>
                        <td><h3>DNI</h3></td>
                        <td><h3>Tutor</h3></td>
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
                    <td>{{$user->phone}}</td>
                    <td>{{$user->dni}}</td>
                    <td>{{$user->tutor}}</td>
                    <td>{{implode (",", $user->actualRoles())}}</td>
                    <td>
                        <a style="color:white" href="{{Route('user.edit',$user->id)}}" class="btn btn-info" user="button">Modificar</a></td>
                    <td>
                        <a style="color:white" href="{{Route('user.show',$user->id)}}" class="btn btn-info" user="button">Veure</a></td>
                    <td>      
                        <form action="{{route('user.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input
                                type="submit"
                                value="Esborrar"
                                class="btn btn-danger"
                            >
                        </form>
                    </td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection
