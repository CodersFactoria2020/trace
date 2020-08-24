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
                <form action="{{Route('team.update', $team->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{$team->first_name}}"/>
                        </div>
                        <div class="form-group">
                            <label for="name">Cognom</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name"value="{{$team->last_name}}"/>
                        </div>
                        <div class="form-group">
                            <label for="name">Posicio</label>
                            <input type="text" name="position" class="form-control" placeholder="Position"value="{{$team->position}}"/>
                        </div>
                        <div class="form-group">
                            <label for="name">Imatge</label>
                            <input type="file" name="photo" class="form-control" >
                        </div>

                        <div class="text-right">
                            <div class="text-right">
                                <a href="{{Route('team.update', $team->id)}}" >
                                    <input type="submit" value="Edit" class="btn btn-primary">
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
