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
                    <div style="padding:5px;">
                        <h5>ID:</h5><p> {{$transparency->id}}</p>
                    </div>
                    <div style="padding:5px;">
                        <h5>Any de l'exercsici:</h5><p>{{$transparency->date_name}}</p>
                    </div>
                    <div style="padding:5px;">
                        <h5>Documentacio Econmica:</h5><p><a href="{{$transparency->get_economic_url()}}">{{Storage::url($transparency->get_economic_url())}}</a></p>
                    </div>
                    <div style="padding:5px;">
                        <h5>Documentacio Economica d'entitats:</h5><p><a href="{{$transparency->get_entity_url()}}">{{Storage::url($transparency->get_entity_url())}}</a></p>
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
