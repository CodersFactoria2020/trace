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
                <form action="{{Route('category.store')}}" method="post" enctype="multipart/form-data"> <!-- enctype para subir el logo -->
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nom de l'àrea</label>
                            <input type="text" name="category_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Descripció</label>
                            <textarea type="text" name="description" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Color de fons:</label>
                            <input type="color" id="category_color"  name="category_color" value="#ff0000" class="form-control" required><br><br>
                        </div>

                        <div class="text-right">
                            <input type="submit" value="Crear" class="btn btn-primary">
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
