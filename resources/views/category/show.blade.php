<div class="modal fade" id="show-category{{$category->id ?? 'Default'}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <h5>ID:</h5><p> {{$category->id ?? 'Default'}}</p>
                        </div>
                        <div style="padding:5px;">
                            <h5>Nom de l'àrea:</h5><p> {{$category->name ?? 'Default'}}</p>
                        </div>
                        <div style="padding:5px;">
                            <h5>Descripció:</h5><p> {{$category->description ?? 'Default'}}</p>
                        </div>
                        <div style="padding:5px;">
                            <h5>Color de fons:</h5><p style="background-color:{{ $category['color'] ?? 'Default' }}; color:{{$category->color ?? 'Default'}}"> {{$category->color ?? 'Default'}} </p>
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tancar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
