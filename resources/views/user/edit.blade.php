<div class="modal fadeIn" id="edit-user{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar usuari</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('user.update', $user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}"/>
                        </div>
                        <div class="form-group">
                            <label>Cognom</label>
                            <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}"/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="{{$user->email}}"/>
                        </div>
                        <div class="form-group">
                            <label>Telèfon</label>
                            <input type="text" name="phone" class="form-control" value="{{$user->phone}}"/>
                        </div>
                        <div class="form-group">
                            <label>DNI</label>
                            <input type="text" name="dni" class="form-control" value="{{$user->dni}}"/>
                        </div>
                        <div class="form-group">
                            <label>Tutor(a)</label>
                            <input type="text" name="tutor" class="form-control" value="{{$user->tutor}}"/>
                        </div>
                        <div class="form-group">
                            <label>Rol</label>
                            <select name="role_id" class="form-control" />
                            <optgroup label="Selecciona un rol">
                            @foreach ($roles as $role)
                                <option value="{{ $role['id'] }}">{{ $role['role_name'] }}</option>
                            @endforeach
                        </div>

                        <div class="text-right">
                            <div class="text-right">
                                <a href="{{Route('user.update', $user->id)}}" >
                                    <input type="submit" value="Actualitzar" class="btn btn-primary">
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>