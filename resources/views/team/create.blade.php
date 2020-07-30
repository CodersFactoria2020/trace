@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('team.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">

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

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
