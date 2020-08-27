<div class="modal fade" id="create-team" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Afegir Membre de l'Equip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <div class="modal-body">
                    <form action="{{Route('team.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate> <!-- enctype para subir el logo -->
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" name="first_name" class="form-control" placeholder="First Name" required/>
                                <div class="invalid-feedback">
                                    El membre de l'equip ha de tenir un nom
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Cognom</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name" required/>
                                <div class="invalid-feedback">
                                    El membre de l'equip ha de tenir un cognom
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Posicio</label>
                                <input type="text" name="position" class="form-control" placeholder="Position" required/>
                                <div class="invalid-feedback">
                                    El membre de l'equip ha de tenir una posicio
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Imatge</label>
                                <input type="file" name="photo" class="form-control" >
                            </div>

                            <div class="text-right mt-4">
                                <input type="submit" value="Afegir" class="cta">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
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
