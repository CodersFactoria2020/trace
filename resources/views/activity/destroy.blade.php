<div  class="modal fadeIn" id="destroy-activity{{$activity->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
             
            <div class="modal-header">
                <h4 class="modal-title">Esborrar activitat</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
 
            <div class="modal-body">
                <p>Segur que desitja esborrar aquesta activitat?</p>
                <div style="padding:5px;">
                    <h5>Nom: {{$activity->title}}</h5>
                </div>
                <div style="padding:5px;">
                    <h5>descripció: {{$activity->description}}</h5>
                </div>
            </div>
 
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel·lar</button>
                <form action="{{Route('activity.destroy', $activity->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Sí, esborrar!">
                </form>
               </div>
        </div>
    </div>
</div>