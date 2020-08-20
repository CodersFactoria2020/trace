<div class="modal fade" id="show-activity{{$activity->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalls de l'activitat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    @method('put')
                    <div class="card-body">
                        <div style="padding:5px;">
                            <h5>ID:</h5><p> {{$activity->id}}</p>
                        </div>
                        <div style="padding:5px;">
                            <h5>Nom de l'activitat:</h5><p> {{$activity->title}}</p>
                        </div>
                        <div style="padding:5px;">
                            <h5>Descripció:</h5><p> {{$activity->description}}</p>
                        </div>
                        <div style="padding:5px;">
                            <h5>Professional responsable:</h5><p> {{$activity->professional1}}</p>
                        </div>
                        <div style="padding:5px;">
                            <h5>Professional de suport:</h5><p> {{$activity->professional2}}</p>
                        </div>
                        <div style="padding:5px;">
                            <h5>Àrea:</h5><p> {{$activity->category_id}}</p>
                        </div>
                        @isset($activity->file)
                        <div style="padding:5px;">
                            <h5>Document adjunt:</h5><p> {{$activity->get_downloaded_file_name()}}</p>
                        </div>
                        <a href="{{Route('download-document', $activity->id)}}">
                            <button type="button" class="btn btn-primary text-right">
                                Descarregar
                            </button>
                        </a>
                        @endisset


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
