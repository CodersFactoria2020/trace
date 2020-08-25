<div class="modal fade" id="edit-activity{{$activity->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar activitat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('activity.update', $activity->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nom de l'activitat</label>
                            <input type="text" name="title" class="form-control" value="{{$activity->title}}"/>
                        </div>
                        <div class="form-group">
                            <label>Descripció</label>
                            <textarea type="text" name="description" class="form-control">{{$activity->description}}</textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Professional</label>
                                <input type="text" name="professional1" class="form-control" value="{{$activity->professional1}}"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Professional de suport</label>
                                <input type="text" name="professional2" class="form-control" value="{{$activity->professional2}}"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Àrea:</label>
                                <select name="category_id" class="form-control">
                                    <optgroup label="Selecciona una àrea">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id}}" style="background-color:{{ $category['color'] }}">{{ $category['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group" >
                            Document adjunt
                            <p>{{$activity->get_downloaded_file_name()}}</p>
                        </div>
                        <div class="form-group" >
                            Adjunta document
                            <input type="file" name="file" id="fileToUpload"/>
                        </div>

                        <div class="text-right">
                            <div class="text-right">
                                <a href="{{Route('activity.update', $activity->id)}}" >
                                    <input type="submit" value="Actualitzar" class="cta">
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
