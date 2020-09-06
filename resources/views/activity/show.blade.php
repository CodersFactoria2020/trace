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
                    <div class="form-row">
                        <div class="col-md-6">
                            <small><b>Inici de l'activitat: </b></small>
                            @if (Auth::User()->role_id == 'Soci')                            
                            <p>{{$activity->start}} {{substr($activity->showStart, 8)}}</p>
                            @endif
                            @if (Auth::User()->role_id !== 'Soci')
                            <p>{{$activity->showStart}}</p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <small><b>Finalització de l'activitat: </b></small>
                            @if (Auth::User()->role_id == 'Soci')                            
                            <p>{{substr($activity->start,0,-5)}} {{substr($activity->showEnd, 10)}}</p>
                            @endif
                            @if (Auth::User()->role_id !== 'Soci')
                            <p>{{$activity->showEnd}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <small><b>L'activitat es repeteix cada setmana:</b></small>
                        <p> {{ $activity->weekly == "Sí" ? "Sí" : "No" }}</p>
                    </div>
                    <div>
                        <small><b>Nom de l'activitat: </b></small>
                        <p>{{$activity->title}}</p>
                    </div>
                    <div>
                        <small><b>Descripció: </b></small>
                        <p>{{$activity->description}}</p>
                    </div>
                    @if ($activity->link)
                    <div class="mb-3">
                        <small><b>Enllaç de l'activitat: </b></small><br>
                        <a href="{{("$activity->link")}}" target="_blank" class="primary-green">{{$activity->link}}</a>
                    </div>
                    @endif
                    <div>
                        <small><b>Professional responsable: </b></small>
                        @foreach ($activity->users as $user)
                        @if ($user->role_id !== 'Soci')
                        <div class="icon-text mb-3">
                                <div class="primary-green">
                                    <a href="mailto:{{$user->email}}?subject={{$activity->title}}&body=Hola, {{$user->first_name}}!" target="_blank" class="primary-green">
                                    <i class="icofont-send-mail" style="font-size:24px"></i>
                                    {{$user->email}}
                                    </a>
                                </div>
                            </div>@endif
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
                        @isset($activity->category->name)
                            <p>{{$activity->category->name}}</p>
                        @endisset
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
