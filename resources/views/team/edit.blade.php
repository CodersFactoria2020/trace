<div class="modal fade" id="edit-team{{$team->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Membre de l'Equip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('team.update', $team->id)}}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" name="first_name" class="form-control" placeholder="Nom" value="{{$team->first_name}}" required>
                            <div class="invalid-feedback">
                                El membre de l'equip ha de tenir un nom
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Cognom</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Cognom" value="{{$team->last_name}}" required>
                            <div class="invalid-feedback">
                                El membre de l'equip ha de tenir un cognom
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Posició</label>
                            <input type="text" name="position" class="form-control" placeholder="Posició" value="{{$team->position}}" required>
                            <div class="invalid-feedback">
                                El membre de l'equip ha de tenir una posició
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Imatge</label>
                            <div class="d-flex justify-content-start pb-3">
                                <img src="{{$team->get_photo_url()}}" width="150" height="150">
                            </div>
                            <input type="file" name="photo" class="form-control">
                        </div>

                        <div class="text-right">
                            <a href="{{Route('team.update', $team->id)}}" >
                                <input type="submit" value="Actualitzar" class="cta">
                            </a>
                        </div>
                    </div>
                </form>
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
