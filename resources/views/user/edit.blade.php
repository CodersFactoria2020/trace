<div class="modal fadeIn" id="edit-user{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar usuari</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <div class="modal-body">
                    <form action="{{Route('user.update', $user->id)}}" method="POST" class="needs-validation"
                        novalidate>
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class='label-small'>Nom</label>
                                <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}"
                                    pattern="[A-Za-z].{1,}" required />
                                <div class="invalid-feedback">
                                    El nom ha de tenir almenys 1 lletra
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Cognom</label>
                                <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}"
                                    pattern="[A-Za-z].{1,}" required />
                                <div class="invalid-feedback">
                                    El cognom ha de tenir almenys 1 lletra
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="{{$user->email}}"
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
                                <div class="invalid-feedback">
                                    El email pot contenir lletres de llatí únic, números, '@' i '.'"
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Contrasenya</label>
                                <input type="text" name="password" class="form-control"
                                    value="{{$user->shown_password}}" pattern=".{5,}" required />
                                <div class="invalid-feedback">
                                    La contrasenya ha de tenir almenys 5 caràcters
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>DNI</label>
                                <input type="text" name="dni" class="form-control" value="{{$user->dni}}" required />
                                <div class="invalid-feedback">
                                    El DNI ha de tenir almenys 5 caràcters alfanumèrics
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Telèfon</label>
                                <input type="text" name="phone" class="form-control" value="{{$user->phone}}" required
                                    pattern="[0-9].{8,}" />
                                <div class="invalid-feedback">
                                    El telèfon ha de tenir almenys 9 números
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Rol</label>
                                <select name="role_id" class="form-control">
                                    <optgroup label="Selecciona un rol">
                                        @foreach ($roles as $role)
                                        <option value="{{ $role['id'] }}">{{ $role['role_name'] }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tutor(a)</label>
                                <input type="text" name="tutor" class="form-control" value="{{$user->tutor}}"
                                pattern="[A-Za-z].{1,}" />
                            </div>
                            <div class="invalid-feedback">
                                El tutor ha de tenir solament lletras
                            </div>
                        </div>

                </div>

                <div class="text-right mb-2">
                    <a href="{{Route('user.update', $user->id)}}">
                        <input type="submit" value="Actualitzar" class="cta">
                    </a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script>
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>