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
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Descripció</label>
                            <textarea type="text" name="description" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Professional</label>
                            <textarea type="text" name="professional1" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Professional de support</label>
                            <input type="text" name="professional2" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Àrea:</label>
                            <select name="category_id" class="form-control" required>
                                <optgroup label="Selecciona una àrea">
                                @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}" style="background-color:{{ $category['color'] }}">{{ $category['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" >
                            Adjunta document
                            <input type="file" name="file" id="fileToUpload"/>
                        </div>

                        <div class="text-right">
                                <input type="submit" value="Crear" class="btn btn-primary" required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
