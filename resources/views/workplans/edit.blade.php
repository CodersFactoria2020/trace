<div class="modal fade" id="edit-workplan{{$workplan->id}}" tabindex="-1" role="dialog" aria-labelledby="editWorkplanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editWorkplanLabel">Editar el pla de treball de </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @method('put')
                <div class="card-body">
                    Y aquí iría el pla de treball
                </div>
            </div>
        </div>
    </div>
</div>