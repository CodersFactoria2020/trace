<div  class="modal fadeIn" id="destroy-transparency{{$transparency->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Esborrar Activitats Economica</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <p>Segur que desitja esborrar aquests documents de <b>{{$transparency->date_name}}</b>?</p>

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
