<div  class="modal fadeIn" id="destroy-activity{{$activity->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Esborrar activitat</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <p>Segur que desitja esborrar aquesta activitat?</p>
                <div>
                    <small><b>Nom: </b></small>
                    <p>{{$activity->title}}</p>
                </div>
                <div>
                    <small><b>Descripció: </b></small>
                    <p>{{$activity->description}}</p>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel·lar</button>
                <form action="{{Route('activity.destroy', $activity->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class=" cta danger" value="Sí, esborrar!">
                </form>
            </div>
        </div>
    </div>
</div>
