<div class="modal fadeIn" id="show-user{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DETALLS DE L'USUARI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    @method('put')
                    <div class="card-body">
                        <div style="padding:5px;">
                            <h5>ID:</h5><p> {{$user->id}}</p>
                        </div>
                        <div style="padding:5px;">
                            <h5>Nom:</h5><p> {{$user->first_name}}</p>
                        </div>
                        <div style="padding:5px;">
                            <h5>Cognom:</h5><p> {{$user->last_name}}</p>
                        </div>
                        <div style="padding:5px;">
                            <a href="mailto:{{$user->email}}?subject=Assumpte...&body=Hola, {{$user->first_name}}!" target="_blank" style="color:white" class="mybtn btn btn-dark btn-lg">
                                <span class="glyphicon glyphicon-envelope"> {{$user->email}}</span> 
                            </a>
                        </div>
                        <div style="padding:5px;">
                            <h5>Telèfon:</h5><p> {{$user->phone}}</p>
                        </div>
                        <div style="padding:5px;">
                            <h5>DNI:</h5><p> {{$user->dni}}</p>
                        </div>
                        <div style="padding:5px;">
                            <h5>Tutor(a):</h5><p> {{$user->tutor}}</p>
                        </div>
                        <div style="padding:5px;">
                            <h5>Rol:</h5><p> {{$user->role_id}}</p>
                        </div>
                        
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tancar</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

