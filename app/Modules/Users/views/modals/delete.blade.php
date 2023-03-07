<div class="modal fade" id="modals-archive-model-user-{{$model->id}}" tabindex="-1" aria-labelledby="modals-archive-model-user-{{$model->id}}" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="{{route('users.delete',['id' => $model->id])}}" id="form-active-model{{$model->id}}" method="POST">
                    @csrf
                    @method('delete')
            <div class="modal-header">
            <h5 class="modal-title" id="modals-archive-model-user-{{$model->id}}">Supprimer un utilisateur</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
            êtes-vous sûr de supprimer cet utilisateur ?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
            <button type="submit" class="btn btn-primary">Oui</button>
            </div>
        </form>
    </div>
    </div>
</div>