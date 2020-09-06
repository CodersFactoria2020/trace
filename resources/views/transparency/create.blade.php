<div class="modal fade" id="create-transparency" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Afegir l'activitat econòmica</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('transparency.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate> <!-- enctype para subir -->
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Any de l'exercici</label>
                            <input type="text" name="date_name" class="form-control" placeholder="Any de l'exercici" required>
                        </div>
                        <div class="invalid-feedback">
                            L'any de l'exercici ha de tenir un títol
                        </div>
                        <div class="form-group">
                            <label for="name">Documentació econòmica</label>
                            <input type="file" name="economic_document" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="name">Documentació econòmica de l'entitat</label>
                            <input type="file" name="entity_document" class="form-control" >
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

<script>
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
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
