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
                        <div style="padding:5px;">
                            <h5>ID:</h5><p> {{$category->id}}</p>
                        </div>
                        <div style="padding:5px;">
                            <h5>Nom de l'àrea:</h5><p> {{$category->category_name}}</p>
                        </div>
                        <div style="padding:5px;">
                            <h5>Descripció:</h5><p> {{$category->description}}</p>
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tancar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
