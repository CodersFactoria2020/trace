@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Roles</h1>
                <hr>
            </div>
            <div class="card-body">
                <form action="{{Route('role.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <input type="text" name="description" class="form-control"/>
                    </div>
                    @foreach ($permissions as $permission)
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input"  type="checkbox"  id="permission_{{$permission->id}}" value="{{$permission->id}}"  name="permission[]">
                        <input class="custom-control-input"  type="checkbox"  id="permission_{{$permission->id}}" value="{{$permission->id}}"  name="permission[]">
                        <label class="custom-control-label" for="permission_{{$permission->id}}" >{{$permission->id}} - {{$permission->name}}
                        </label>
                    </div>
                    @endforeach
                    <input type="submit" value="Add role" class="btn btn-primary">
                </form>
            </div>
            <div class="card-footer">
                <a href="{{Route('role.index')}}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection