<div  class="modal fadeIn" id="destroy-team{{$team->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Esborrar Membre de l'Equip</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <p>Segur que desitja esborrar aquest membre de l'equip?</p>
                <div style="padding:5px;">
                    <h5>Nom i Cognom: {{$team->first_name}}, {{$team->last_name}}</h5>
                </div>
                <div style="padding:5px;">
                    <h5>Professio: {{$team->position}}</h5>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel·lar</button>
                <form action="{{Route('team.destroy', $team->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Sí, esborrar!">
                </form>
               </div>
        </div>
    </div>
</div>
