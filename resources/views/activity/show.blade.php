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
                    <div>
                        <small><b>Nom de l'activitat: </b></small>
                        <p>{{$activity->title}}</p>
                    </div>
                    <div>
                        <small><b>Descripció: </b></small>
                        <p>{{$activity->description}}</p>
                    </div>
                    <div>
                        <small><b>Professional responsable: </b></small>
                        @foreach ($activity->users as $user)
                        @if ($user->role_id == 'Professional')
                            <p>{{$user->first_name}} {{$user->last_name}} </p>
                        @endif
                        @endforeach
                    </div>
                    <div>
                        <small><b>Socis: </b></small>
                        @foreach ($activity->users as $user)
                        @if ($user->role_id == 'Soci')
                        <p>{{$user->first_name}} {{$user->last_name}}</p>
                        @endif
                        @endforeach
                    </div>
                    <div>
                        <small><b>Àrea: </b></small>
                        <p>{{$activity->category->name}}</p>
                    </div>
                    @if($activity->has_file())
                    <div>
                        <small><b>Document adjunt: </b></small>
                        <p>{{$activity->get_downloaded_file_name()}}</p>
                    </div>
                    <a href="{{Route('download-document', $activity->id)}}">
                        <button type="button" class="cta text-right">
                            Descarregar
                        </button>
                    </a>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
