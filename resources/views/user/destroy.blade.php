<div  class="modal fadeIn" id="destroy-user{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
             
            <div class="modal-header">
                <h5 class="modal-title">Esborrar usuari</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
 
            <div class="modal-body">
                <p>Segur que desitja esborrar aquest usuari?</p>
                <div>
                    <small><b>Nom: </b></small><p>{{$user->first_name}}</p>
                </div>
                <div>
                    <small><b>Cognom: </b></small><p>{{$user->last_name}}</p>
                </div>
            </div>
 
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel·lar</button>
                <form action="{{Route('user.destroy', $user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="cta" value="Sí, esborrar!">
                </form>
               </div>
        </div>
    </div>
</div>
