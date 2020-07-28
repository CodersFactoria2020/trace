@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Roles</h1>
                <hr>
            </div>
            <div class="card-body">
                <form action="{{Route('role.update',$role->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Name</label>
                    <input type="text" name="owner" class="form-control" value="{{$role->name}}"/>
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <input type="text" name="description" class="form-control" value="{{$role->description}}"/>
                    </div>
                    <input type="submit" value="Edit" class="btn btn-primary">
                </form>
            </div>
            <div class="card-footer">
                <a href="{{Route('role.index')}}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
