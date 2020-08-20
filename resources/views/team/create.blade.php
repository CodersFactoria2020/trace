<div class="modal fade" id="create-team" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Afegir Membre de l'Equip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('team.store')}}" method="post" enctype="multipart/form-data"> <!-- enctype para subir el logo -->
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name"/>
                        </div>
                        <div class="form-group">
                            <label for="name">Cognom</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name"/>
                        </div>
                        <div class="form-group">
                            <label for="name">Posicio</label>
                            <input type="text" name="position" class="form-control" placeholder="Position"/>
                        </div>
                        <div class="form-group">
                            <label for="name">Imatge</label>
                            <input type="file" name="photo" class="form-control" >
                        </div>

                        <div class="text-right">
                                <input type="submit" value="Crear" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
