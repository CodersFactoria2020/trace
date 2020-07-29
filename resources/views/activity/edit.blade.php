<div class="modal fade" id="edit-activity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar activitat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('activity.update', $activity->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nom de l'activitat</label>
                            <input type="text" name="name" class="form-control" value="{{$activity->name}}"/>
                        </div>
                        <div class="form-group">
                            <label>Descripció</label>
                            <input type="text" name="description" class="form-control" value="{{$activity->description}}"/>
                        </div>
                        <div class="form-group">
                            <label>Professional</label>
                            <input type="text" name="professional" class="form-control" value="{{$activity->professional}}"/>
                        </div>
                        <div class="form-group">
                            <label>Data</label>
                            <input type="text" name="date" class="form-control" value="{{$activity->date}}"/>
                        </div>
                        <div class="form-group">
                            <label>Hora</label>
                            <input type="text" name="time" class="form-control" value="{{$activity->time}}"/>
                        </div>

                        <div class="text-right">
                            <div class="text-right">
                                <a href="{{Route('activity.update', $activity->id)}}" >
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
