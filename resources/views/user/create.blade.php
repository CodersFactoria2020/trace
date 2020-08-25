<div class="modal fadeIn" id="create-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nou usuari</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <div class="modal-body">
                    <form action="{{Route('user.store')}}" method="POST">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nom</label>
                                <input type="text" name="first_name" class="form-control" placeholder="Nom" required/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Cognom</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Cognom" required/>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email" required/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Contrasenya</label>
                                <input type="text" name="password" class="form-control" placeholder="Contrasenya" required/>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Telèfon</label>
                                <input type="text" name="phone" class="form-control" placeholder="Telèfono" required/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>DNI</label>
                                <input type="text" name="dni" class="form-control" placeholder="DNI" required/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Rol</label>
                                <select name="role_id" class="form-control">
                                    <optgroup label="Selecciona un rol">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->role_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tutor(a)</label>
                                <input type="text" name="tutor" class="form-control" placeholder="Tutor"/>
                            </div>
                        </div>
                        <div class="text-right mt-4">
                            <input type="submit" value="Afegir" class="cta">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
