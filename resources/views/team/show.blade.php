<div class="modal fade" id="show-team{{$team->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalls del Membre de l'equip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @method('put')
                <div class="card-body">
                    <div style="padding:5px;">
                        <h5>ID:</h5><p> {{$team->id}}</p>
                    </div>
                    <div style="padding:5px;">
                        <h5>Name i Cognom:</h5><p>{{$team->first_name}} {{$team->last_name}}</p>
                    </div>
                    <div style="padding:5px;">
                        <h5>Description:</h5><p>{{$team->position}}</p>
                    </div>
                    <div style="padding:5px;">
                        <h5>Imatge adjunt:</h5><p><img src="{{$team->get_photo_url()}}" width="150" height="150"></p>
                    </div>

                    <div class="text-right">
                        <div class="text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tancar</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
