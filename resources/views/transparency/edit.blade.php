<div class="modal fade" id="edit-transparency{{$transparency->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Membre de l'Equip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('transparency.update', $transparency->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Any de l'exercici</label>
                            <input type="text" name="date_name" class="form-control" placeholder="First Name"/>
                        </div>
                        <div class="form-group">
                            <label for="name">Documentacio d'activitat economica</label>
                            <input type="file" name="economic_document" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="name">Documentacio economica d'entitats</label>
                            <input type="file" name="entity_document" class="form-control" >
                        </div>

                        <div class="text-right">
                            <div class="text-right">
                                <a href="{{Route('transparency.update', $transparency->id)}}" >
                                    <input type="submit" value="Edit" class="btn btn-primary">
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
