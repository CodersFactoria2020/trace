<div class="modal fade" id="edit-category{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar les dades de l'àrea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('category.update', $category->id)}}" method="post" class="needs-validation" novalidate>
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nom de l'àrea</label>
                            <input type="text" name="name" class="form-control" value="{{$category->name}}" required/>
                            <div class="invalid-feedback">
                                L'àrea ha de tenir un nom
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Descripció</label>
                            <input type="text" name="description" class="form-control" value="{{$category->description}}" required/>
                            <div class="invalid-feedback">
                                L'àrea ha de tenir una descripció
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Color de fons:</label>
                                <input type="color" id="color"  name="color" value="{{ $category->color}}" class="form-control">
                            </select>
                        </div>

                        <div class="text-right">
                            <div class="text-right">
                                <a href="{{Route('category.update', $category->id)}}" >
                                    <input type="submit" value="Actualitzar" class="cta">
                                </a>
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
