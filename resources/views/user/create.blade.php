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
                    <form action="{{Route('user.store')}}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="validationCustom01">Nom</label>
                                <input type="text" id="validationCustom01" name="first_name" class="form-control" placeholder="Nom" required/>
                                <div class="invalid-feedback">
                                    El nom ha de tenir almenys 3 caràcters
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Cognom</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Cognom" required/>
                                <div class="invalid-feedback">
                                    El cognom ha de tenir almenys 3 caràcters
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email" required/>
                                <div class="invalid-feedback">
                                    El email no és vàlid
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Contrasenya</label>
                                <input type="text" name="password" class="form-control" placeholder="Contrasenya" required/>
                                <div class="invalid-feedback">
                                    La contrasenya ha de tenir almenys 3 caràcters
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Telèfon</label>
                                <input type="text" name="phone" class="form-control" placeholder="Telèfono">
                            </div>
                            <div class="form-group col-md-6">
                                <label>DNI</label>
                                <input type="text" name="dni" class="form-control" placeholder="DNI" required/>
                                <div class="invalid-feedback">
                                    El DNI ha de tenir almenys 9 caràcters
                                </div>
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
