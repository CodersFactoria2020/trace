
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('team.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <form action="{{ route('team.update',$team->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom y Cognom:</strong>
                    <input type="text" name="fullname" value="{{ $team->fullname }}" class="form-control" placeholder="fullname">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Profecio:</strong>
                    <input type="text" name="fullname" value="{{ $team->profession }}" class="form-control" placeholder="profession">
                </div>
                <div class="col-md-6">
                    <strong>Profecio:</strong>
                    <input type="file" name="image" class="form-control" value="{{ $team->photo }}">
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
