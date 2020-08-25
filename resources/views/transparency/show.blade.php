<div class="modal fade" id="show-transparency{{$transparency->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <div>
                        <small><b>Any de l'exercsici:</b></small>
                        <p>{{$transparency->date_name}}</p>
                    </div>
                    <div>
                        <small><b>Documentacio Econmica:</b></small>
                        <p>{{$transparency->economic_document}}</p>
                    </div>
                    <div>
                        <small><b>Documentacio Economica d'entitats:</b></small>
                        <p>{{$transparency->entity_document}}</p>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
