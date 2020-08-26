<div class="modal fade" id="create-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Afegir una nova àrea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('category.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate> <!-- enctype para subir el logo -->
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nom de l'àrea</label>
                            <input type="text" name="name" class="form-control" required>
                            <div class="invalid-feedback">
                                L'àrea ha de tenir un nom
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Descripció</label>
                            <textarea type="text" name="description" class="form-control" required></textarea>
                            <div class="invalid-feedback">
                                L'àrea ha de tenir una descripció
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Color de fons:</label>
                            <input type="color" id="color"  name="color" value="#ff0000" class="form-control" required><br><br>
                        </div>

                        <div class="text-right">
                            <input type="submit" value="Afegir" class="cta">
                        </div>
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
