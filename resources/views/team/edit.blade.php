@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Membre de l'equip</h1>
                <hr>
            </div>
            <div class="card-body">
                <form action="{{Route('team.update',$team->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="first_name" class="form-control" placeholder="First Name"/>
                    </div>
                    <div class="form-group">
                        <label for="name">Cognom</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name"/>
                    </div>
                    <div class="form-group">
                        <label for="name">Posicio</label>
                        <input type="text" name="position" class="form-control" placeholder="Position"/>
                    </div>
                    <div class="form-group">
                        <label for="name">Imatge</label>
                        <input type="file" name="photo" class="form-control" >
                    </div>
                    <input type="submit" value="Edit" class="btn btn-primary" href="{{Route('team.index')}}">
                </form>
            </div>
            <div class="card-footer">
                <a v class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
