<div class="modal fade" id="show-workplan{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="showWorkplanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showWorkplanLabel">Detalls del pla de treball de {{ $user->first_name }} {{ $user->last_name }}</h5>
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