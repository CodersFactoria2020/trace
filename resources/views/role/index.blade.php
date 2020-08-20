@extends('layouts.app-dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Your roles</h1><hr>
                <a href="{{Route('role.create')}}" class="btn btn-secondary">Add New</a>
                <a href="{{Route('home')}}" class="btn btn-secondary">Back Home</a>
            </div>
            <table class="table table-triped">
                <thead>
                    <tr>
                        <td><h3>ID</h3></td>
                        <td><h3>Name</h3></td>
                        <td><h3>Description</h3></td>
                        <td colspan="3"><h3>Actions</h3></td>
                    </tr>
                </thead>

                @foreach($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->description}}</td>
                    <td>
                        <a style="color:white" href="{{Route('role.edit',$role->id)}}" class="btn btn-info" role="button">Modify</a></td>
                    <td>
                        <a style="color:white" href="{{Route('role.show',$role->id)}}" class="btn btn-info" role="button">See</a></td>
                    <td>      
                        <form action="{{route('role.destroy', $role->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <input
                                type="submit"
                                value="Delete"
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
