@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                     <h1>USUARIS REGISTRATS</h1>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
=======
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Your users</h1><hr>
                <a href="{{Route('user.create')}}" class="btn btn-secondary">Add New</a>
                <a href="{{Route('home')}}" class="btn btn-secondary">Back Home</a>
            </div>
            <table class="table table-triped">
                <thead>
                    <tr>
                        <td><h3>ID</h3></td>
                        <td><h3>First Name</h3></td>
                        <td><h3>Last Name</h3></td>
                        <td><h3>Email</h3></td>
                        <td><h3>Phone</h3></td>
                        <td><h3>DNI</h3></td>
                        <td><h3>Tutor</h3></td>
                        <td><h3>Rol</h3></td>
                        <td colspan="3"><h3>Actions</h3></td>
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
                        <a style="color:white" href="{{Route('user.edit',$user->id)}}" class="btn btn-info" user="button">Modify</a></td>
                    <td>
                        <a style="color:white" href="{{Route('user.show',$user->id)}}" class="btn btn-info" user="button">See</a></td>
                    <td>      
                        <form action="{{route('user.destroy', $user->id)}}" method="post">
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
>>>>>>> 22315745d994d0f47e2f7657a34d3fa33beba5d4
@endsection
