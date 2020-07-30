@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>NOU USUARI</h1>
                <hr>
            </div>
            <div class="card-body">
                <form action="{{Route('user.store')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nom</label>
                    <input type="text" name="first_name" class="form-control" placeholder="Nom"/>
                    </div>
                    <div class="form-group">
                        <label for="name">Cognom</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Cognom"/>
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <label for="name">Telèfon</label>
                    <input type="text" name="phone" class="form-control" placeholder="+34111222333"/>
                    </div>
                    <div class="form-group">
                        <label for="name">DNI</label>
                    <input type="text" name="dni" class="form-control" placeholder="DNI"/>
                    </div>
                    <div class="form-group">
                        <label for="name">Tutor</label>
                    <input type="text" name="tutor" class="form-control" placeholder="Tutor"/>
                    </div>

                    <div class="form-group">
                        <label for="roles"><h3>Rol:</h3></label>
                            <select class="form-control" name="roles" id="roles">
                                @foreach ($roles as $role)
                                    <option value="{{$role->id}}"
                                    >{{$role->name}}</option>
                                @endforeach
                            </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Contrasenya</label>
                    <input type="text" name="password" class="form-control" placeholder="password"/>
                    </div>

                    <input type="submit" placeholder="Afegir" class="btn btn-primary">
                </form>
            </div>
            <div class="card-footer">
                <a href="{{Route('user.index')}}" class="btn btn-secondary">Tornar</a>
            </div>
        </div>
    </div>
@endsection
