<div class="modal fade" id="show-category{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalls de l'àrea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    @method('put')
                    <div class="card-body">
                        <div>
                            <small><b>ID:</b></small>
                            <p> {{$category->id}}</p>
                        </div>
                        <div>
                            <small><b>Nom de l'àrea:</b></small>
                            <p> {{$category->name}}</p>
                        </div>
                        <div>
                            <small><b> Descripció:</b></small>
                            <p> {{$category->description}}</p>
                        </div>
                        <div>
                            <small><b>Color de fons:</b></small>
                            <p style="background-color:{{ $category['color'] }}; color:{{$category->color}}"> {{$category->color}} </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
