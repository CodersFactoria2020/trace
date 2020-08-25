<div  class="modal fadeIn" id="destroy-team{{$team->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Esborrar Membre de l'Equip</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <p>Segur que desitja esborrar aquest membre de l'equip?</p>
                <div>
                    <small><b>Nom i Cognom: </b></small>
                    <p>{{$team->first_name}}, {{$team->last_name}}</p>
                </div>
                <div>
                    <small><b>Professio: </b></small>
                    <p>{{$team->position}}</p>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel·lar</button>
                <form action="{{Route('team.destroy', $team->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="cta" value="Sí, esborrar!">
                </form>
               </div>
        </div>
    </div>
</div>
