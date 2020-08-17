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
                <form action="{{Route('category.update', $category->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nom de l'àrea</label>
                            <input type="text" name="category_name" class="form-control" value="{{$category->category_name}}"/>
                        </div>
                        <div class="form-group">
                            <label>Descripció</label>
                            <input type="text" name="description" class="form-control" value="{{$category->description}}"/>
                        </div>
                        <div class="form-group">
                            <label>Color de fons:</label>
                            <select name="category_color" class="form-control">
                                <optgroup label="Selecciona un color">
                                @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['category_color'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="text-right">
                            <div class="text-right">
                                <a href="{{Route('category.update', $category->id)}}" >
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
