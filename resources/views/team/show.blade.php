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
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <small><b>Imatge adjunt:</b></small>
                            <p><img src="{{$team->get_photo_url()}}" width="150" height="150"></p>
                        </div>
    
                        <div class="form-group col-md-6">
                            <div>
                                <small><b>Name i Cognom:</b></small>
                                <p>{{$team->first_name}} {{$team->last_name}}</p>
                            </div>
                            <div>
                                <small><b>Description:</b></small>
                                <p>{{$team->position}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
