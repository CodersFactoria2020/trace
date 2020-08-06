<div class="modal fadeIn" id="create-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nou usuari</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('user.store')}}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="first_name" class="form-control" placeholder="Nom"/>
                        </div>
                        <div class="form-group">
                            <label>Cognom</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Cognom"/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email"/>
                        </div>
                        <div class="form-group">
                            <label>Contrasenya</label>
                            <input type="text" name="password" class="form-control" placeholder="password"/>
                        </div>
                        <div class="form-group">
                            <label>Telèfon</label>
                            <input type="text" name="phone" class="form-control" placeholder="+34111222333"/>
                        </div>
                        <div class="form-group">
                            <label>DNI</label>
                            <input type="text" name="dni" class="form-control" placeholder="DNI"/>
                        </div>
                        <div class="form-group">
                            <label>Tutor(a)</label>
                            <input type="text" name="tutor" class="form-control" placeholder="Tutor"/>
                        </div>
                        <div class="form-group">
                            <label>Rol</label>
                            <select name="role_id" class="form-control" />
                            <optgroup label="Selecciona un rol">
                            @foreach ($roles as $role)
                                <option value="{{ $role['id'] }}">{{ $role['role_name'] }}</option>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <input type="submit" value="Desar" class="mybtn btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>