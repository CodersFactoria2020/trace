<div class="modal fadeIn" id="create-workplan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nou pla de treball</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('workplans.store')}}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label>Títol</label>
                            <input type="text" name="title" class="form-control" placeholder="Títol"/>
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <input type="submit" value="Desar" class="mybtn btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>