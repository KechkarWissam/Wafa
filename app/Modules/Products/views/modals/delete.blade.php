<div class="modal fade" id="modals-archive-model-classroom-{{$model->id}}" tabindex="-1" aria-labelledby="modals-archive-model-classroom-{{$model->id}}" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="{{route('classrooms.delete',['id' => $model->id])}}" id="form-active-model{{$model->id}}" method="POST">
                    @csrf
                    @method('delete')
            <div class="modal-header">
            <h5 class="modal-title" id="modals-archive-model-classroom-{{$model->id}}">Archiver une salle</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            êtes-vous sûr d'archiver cette salle ?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-white" data-bs-dismiss="modal">Non</button>
            <button type="submit" class="btn btn-primary">Oui</button>
            </div>
        </form>
    </div>
    </div>
</div>