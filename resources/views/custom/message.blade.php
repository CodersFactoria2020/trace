@if(session('status_success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{session('status_success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('status_error'))
    <div class="alert alert-danger" role="alert">{{session('status_error')}}
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
