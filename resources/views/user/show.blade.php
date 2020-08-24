<div class="modal fadeIn" id="show-user{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalls de l'usuari</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    @method('put')
                    <div class="card-body">
                        <div>
                            <small><b>Nom:</b></small><p> {{$user->first_name}}</p>
                        </div>
                        <div>
                            <small><b>Cognom:</b></small><p> {{$user->last_name}}</p>
                        </div>
                        <div>
                            <small><b>Correo:</b></small>
                            <div class="icon-text mb-3">
                                <div class="primary-green">
                                    <a href="mailto:{{$user->email}}?subject=Assumpte...&body=Hola, {{$user->first_name}}!" target="_blank" class="primary-green">
                                    <i class="icofont-send-mail" style="font-size:24px"></i>
                                    {{$user->email}}
                                    </a>
                                </div>
                            </div>
                        </div>     
                        <div>
                            <small><b>Telèfon:</b></small>
                            <p>{{$user->phone}}</p>
                        </div>
                        <div>
                            <small><b>DNI:</b></small>
                            <p>{{$user->dni}}</p>
                        </div>
                        <div>
                            <small><b>Tutor(a):</b></small>
                            <p>{{$user->tutor}}</p>
                        </div>
                        <div>
                            <small><b>Rol:</b></small>
                            <p>{{$user->role_id}}</p>
                        </div>
                        
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

