<div  class="modal fadeIn" id="destroy-category{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Esborrar l'àrea</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <p>Segur que desitja esborrar aquesta àrea?</p>
                <div>
                    <small><b>Nom: </b></small>
                    <p>{{$category->name}}</p>
                </div>
                <div>
                    <small><b>Descripció: </b></small>
                    <p>{{$category->description}}</p>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel·lar</button>
                <form action="{{Route('category.destroy', $category->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" class="cta" value="Sí, esborrar!">
                </form>
               </div>
        </div>
    </div>
</div>
