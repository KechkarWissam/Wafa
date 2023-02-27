<div class="modal fade" id="modals-delete-model-product-category-{{$model->id}}" tabindex="-1" aria-labelledby="modals-delete-model-product-category-{{$model->id}}" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="{{route('productcategories.delete',['id' => $model->id])}}" id="form-active-model{{$model->id}}" method="POST">
                    @csrf
                    @method('delete')
            <div class="modal-header">
            <h5 class="modal-title" id="modals-delete-model-product-category-{{$model->id}}">Supprimer une catégorie</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            êtes-vous sûr de supprimer cette catégorie ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                <button type="submit" class="btn btn-primary">Oui</button>
            </div>
        </form>
    </div>
    </div>
</div>