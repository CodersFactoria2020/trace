<div class="modal fade" id="create-activity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Afegir activitat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <div class="modal-body">
                    <form action="{{Route('activity.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nom de l'activitat</label>
                                <input type="text" name="title" class="form-control" required>
                                <div class="invalid-feedback">
                                    L'activitat ha de tenir un nom
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Descripció</label>
                                <textarea type="text" name="description" class="form-control" required></textarea>
                                <div class="invalid-feedback">
                                    L'activitat ha de tenir una descripció
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Enllaç de l'activitat (opcional)</label>
                                <input type="text" name="link" class="form-control" pattern="https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)">
                                <div class="invalid-feedback">
                                    L'activitat ha de tenir un enllaç
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Professional</label>
                                    <select name="user[]"  class="form-control"  required>
                                        <option disabled selected value> Selecciona un professional </option>
                                        @foreach ($users as $user)
                                            <option id="user_{{$user->id}}" value="{{$user->id}}">{{ $user->first_name}} {{ $user->last_name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        L'activitat ha de tenir un professional assignat
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Àrea:</label>
                                    <select name="category_id" class="form-control" required>
                                        <option disabled selected value> Selecciona una àrea </option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category['id'] }}" style="background-color:{{ $category->color }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        L'activitat ha de tenir una àrea assignada
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Socis:</label><br>
                                    <div class="dropdown">
                                        <button style="padding-left:0px" class="btn form-control" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                            <span class="glyphicon glyphicon-menu-down"></span>
                                            Selecciona un soci
                                            <i style="padding-left:125px" class="fas fa-angle-down"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @foreach ($socis as $soci)
                                            <input class="mr-1 mb-3 ml-3" type="checkbox" value="{{ $soci['id'] }}" name="socis[]"> {{ $soci['first_name'] }} <br>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row pt-2">
                                <div class="form-group col-md-6 pt-2">
                                    <label>Document adjunt:</label>
                                    <input type="file" name="file" id="fileToUpload"/>
                                </div>
                            </div>

                            <div class="text-right">
                                    <input type="submit" value="Afegir" class="cta" required>
                            </div>
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
    });

</script>
