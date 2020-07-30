<div class="modal fade" id="create-activity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Afegir activitat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('activity.store')}}" method="post" enctype="multipart/form-data"> <!-- enctype para subir el logo -->
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nom de l'activitat</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Descripció</label>
                            <textarea type="text" name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Professional</label>
                            <textarea type="text" name="professional" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Data</label>
                            <textarea type="text" name="date" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Hora</label>
                            <textarea type="text" name="time" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            Adjunta document
                            <input type="file" name="file" id="fileToUpload"/>
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
