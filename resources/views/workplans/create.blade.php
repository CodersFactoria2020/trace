<div class="modal fadeIn" id="create-workplan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
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
                            <label>Soci</label>
                            <select name="user_id" class="form-control">
                                <optgroup label="Selecciona un soci">
                                    @foreach ($users as $user)
                                    <option value="{{ $user['id'] }}">{{ $user['first_name'] }} {{ $user['last_name'] }}
                                    </option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @foreach ($activities as $activity)

                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="activity_{{$activity->id}}"
                                    value="{{$activity->id}}" name="activity[]">
                                <input class="custom-control-input" type="checkbox" id="activity_{{$activity->id}}"
                                    value="{{$activity->id}}" name="activity[]">
                                <label class="custom-control-label" for="activity_{{$activity->id}}">{{$activity->id}}
                                    - {{$activity->title}}
                                </label>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="text-right mt-4">
                        <input type="submit" value="Afegir" class="cta">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>