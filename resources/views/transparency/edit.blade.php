<div class="modal fade" id="edit-transparency{{$transparency->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar activitat econòmica</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('transparency.update', $transparency->id)}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Any de l'exercici</label>
                            <input type="text" name="date_name" class="form-control" placeholder="Any de l'exercici economic" value="{{$transparency->date_name}}"  required>
                        <div class="invalid-feedback">
                            L'any de l'exercici ha de tenir un títol
                        </div>
                        </div>
                        <div class="form-group pt-2">
                            <label for="name">Documentació de l'activitat econòmica</label>
                            @if($transparency->has_economic_document())
                            <p style="opacity: 0.7">{{$transparency->get_saved_name_economic_document()}}</p>
                            @endif
                            <input type="file" name="economic_document" class="form-control" >
                        </div>
                        <div class="form-group pt-2">
                            <label for="name">Documentació econòmica de l'entitat</label>
                            @if($transparency->has_entity_document())
                            <p style="opacity: 0.7">{{$transparency->get_saved_name_entity_document()}}</p>
                            @endif
                            <input type="file" name="entity_document" class="form-control" >
                        </div>

                        <div class="text-right pt-4">
                            <a href="{{Route('transparency.update', $transparency->id)}}" >
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
