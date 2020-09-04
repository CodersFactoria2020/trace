<div class="modal fade" id="edit-activity{{$activity->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar activitat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('activity.update', $activity->id)}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @method('put')
                    <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Data d'inici:</label>
                                <div class="input-group">
                                    <input type="datetime-local" name="start" class="form-control" value="{{ $activity->start }}" required>
                                </div>
                                <div class="invalid-feedback">
                                    L'activitat ha de tenir una data d'inici
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                            <label>Data de finalització:</label>
                                <div class="input-group">
                                    <input type="datetime-local" name="end" class="form-control" value="{{ $activity->end }}"required>
                                </div>
                                <div class="invalid-feedback">
                                    L'activitat ha de tenir una data de finalització
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Marqui aquesta casella si l'activitat es repeteix cada setmana:</label>
                                <input type="hidden" name="weekly" value="0" />
                                <label class="w3-validate" style="padding-left: 1rem;"></label>
                                <input type="checkbox" name="weekly" value="1" <?php if($activity->weekly == "Sí") echo "checked"; ?>/>
                        </div>
                        <div class="form-group">
                            <label>Nom de l'activitat</label>
                            <input type="text" name="title" class="form-control" value="{{$activity->title}}" required/>
                            <div class="invalid-feedback">
                                L'activitat ha de tenir un nom
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Descripció</label>
                            <textarea type="text" name="description" class="form-control" required>{{$activity->description}}</textarea>
                            <div class="invalid-feedback">
                                L'activitat ha de tenir una descripció
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Enllaç de l'activitat (opcional)</label>
                            <input type="text" name="link" class="form-control" pattern="https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)" value="{{$activity->link}}" >
                            <div class="invalid-feedback">
                                L'enllaç ha de començar amb http:// o https://
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Professional</label>
                                <select name="user[]"  class="form-control"  required>
                                    @foreach ($users as $user)
                                    @if($user->role_id !== "Soci")
                                        <option id="user_{{$user->id}}" value="{{$user->id}}" {{$activity->user_id == $user->id ? 'selected' : ''}}>{{ $user->first_name}} {{ $user->last_name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    L'activitat ha de tenir un professional assignat
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Àrea:</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id}}" style="background-color:{{ $category->color }}" {{$activity->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
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
                                <div>
                                    <input class="form-control" id="socisEdit{{$activity->id}}" type="text" placeholder="Buscar...">
                                    <ul aria-labelledby="dropdownMenuButton"  id="socisListEdit{{$activity->id}}">

                                        @foreach ($socis as $soci)

                                            @if ($activity->users->contains($soci)== true)
                                                <li class="mr-1 mb-3 ml-3" style="list-style-type: none">
                                                <input type="checkbox" value="{{ $soci['id'] }}" name="socis[]" checked>
                                                    {{ $soci['first_name'] }} {{ $soci['last_name'] }}
                                                </li>
                                            @endif

                                            @if ($activity->users->contains($soci)== false)
                                                <li class="mr-1 mb-3 ml-3" style="list-style-type: none;display:{{isset($activity->users->id) ? 'block' : 'none'}}">
                                                <input type="checkbox" value="{{ $soci['id'] }}" name="socis[]">
                                                    {{ $soci['first_name'] }} {{ $soci['last_name'] }}
                                                </li>
                                            @endif

                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>

                        @if($activity->has_file())
                        <div class="form-row">
                            <div class="form-group col-md-6 pt-2">
                                <label>Document adjunt: </label>
                                <div class="d-flex justify-content-start pb-3">
                                    {{$activity->get_downloaded_file_name()}}
                                        <a type="submit" href="{{Route('destroy-file', $activity->id)}}" class="close pl-2">x</a>
                                    <!--TODO: cambiar enlace por formulario.-->
                                </div>
                            </div>
                        </div>
                        @endif
                        <div>
                            <input type="file" name="file" id="fileToUpload"/>
                        </div>

                        <div class="text-right">
                            <div class="text-right">
                                <a href="{{Route('activity.update', $activity->id)}}" >
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

<!-- Socis List filter Script -->
<script>
    $(document).ready(function(){
    $("#socisEdit{{$activity->id}}").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#socisListEdit{{$activity->id}} li").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    });
</script>

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
