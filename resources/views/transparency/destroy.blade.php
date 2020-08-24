<div  class="modal fadeIn" id="destroy-transparency{{$transparency->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Esborrar Activitat Econòmica</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <p>Segur que desitja esborrar aquest activitat economica?</p>
                <div style="padding:5px;">
                    <h5>Activitat Economica: {{$transparency->date_name}}</h5>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel·lar</button>
                <form action="{{Route('transparency.destroy', $transparency->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Sí, esborrar!">
                </form>
            </div>
        </div>
    </div>
</div>
