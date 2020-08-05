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
                            <h5>ID: {{$user->id}}</h5>
                        </div>
                        <div style="padding:5px;">
                            <h5>Nom: {{$user->first_name}}</h5>
                        </div>
                        <div style="padding:5px;">
                            <h5>Cognom: {{$user->last_name}}</h5>
                        </div>
                        <div style="padding:5px;">
                            <a href="mailto:{{$user->email}}?subject=Assumpte...&body=Hola, {{$user->first_name}}!" target="_blank" style="color:white" class="mybtn btn btn-dark btn-lg">
                                <span class="glyphicon glyphicon-envelope"> {{$user->email}}</span> 
                            </a>
                        </div>
                        <div style="padding:5px;">
                            <h5>Telèfon: {{$user->phone}}</h5>
                        </div>
                        <div style="padding:5px;">
                            <h5>DNI: {{$user->dni}}</h5>
                        </div>
                        <div style="padding:5px;">
                            <h5>Tutor(a): {{$user->tutor}}</h5>
                        </div>
                        <div style="padding:5px;">
                            <h5>Rol: {{implode (",", $user->actualRoles())}}</h5>
                        </div>

                        <div class="card-footer text-right">
                            <a href="{{Route('user.index')}}" class="btn btn-secondary">Tancar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

