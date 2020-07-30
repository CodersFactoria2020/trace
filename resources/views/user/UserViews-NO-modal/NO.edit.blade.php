@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>USUARI</h1>
                <hr>
            </div>
            <div class="card-body">
                <form action="{{Route('user.update',$user->id)}}" method="POST">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="name">Nom</label>
                    <input type="text" name="owner" class="form-control" value="{{$user->first_name}}"/>
                    </div>
                    <div class="form-group">
                        <label for="name">Cognom</label>
                    <input type="text" name="owner" class="form-control" value="{{$user->last_name}}"/>
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                    <input type="text" name="owner" class="form-control" value="{{$user->email}}"/>
                    </div>
                    <div class="form-group">
                        <label for="name">Telèfon</label>
                    <input type="text" name="owner" class="form-control" value="{{$user->phone}}"/>
                    </div>
                    <div class="form-group">
                        <label for="name">DNI</label>
                    <input type="text" name="owner" class="form-control" value="{{$user->dni}}"/>
                    </div>
                    <div class="form-group">
                        <label for="name">Tutor</label>
                    <input type="text" name="owner" class="form-control" value="{{$user->tutor}}"/>
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

                    <input type="submit" value="Actualitzar" class="btn btn-primary">
                </form>
            </div>
            <div class="card-footer">
                <a href="{{Route('user.index')}}" class="btn btn-secondary">Tornar</a>
            </div>
        </div>
    </div>
@endsection
