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
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Descripció</label>
                            <textarea type="text" name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Professional</label>
                            <textarea type="text" name="professional1" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Professional de support</label>
                            <input type="text" name="professional2" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Data i hora de inici</label>
                            <textarea type="text" name="start" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Data i hora de finalització</label>
                            <textarea type="text" name="end" class="form-control"></textarea>
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