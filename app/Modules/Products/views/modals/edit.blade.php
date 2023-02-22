<div class="modal fade" id="modals-edit-model-classroom-{{$model->id}}" tabindex="-1" aria-labelledby="modals-edit-model-classroom-{{$model->id}}" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Form -->
                <form action="{{ route('classrooms.update',['id'=>$model->id])}}"
                    method="POST" id="classroom-form" >
                    @csrf
                    @method('patch')
                     <div class="modal-header">
                        <h5 class="modal-title" id="modals-edit-model-classroom-{{$model->id}}">Modifier une salle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <!-- Form -->
                                <div class="row mb-4">
                                    <x-MyInputField
                                        id="name" 
                                        name="name" 
                                        label="Nom de la salle" 
                                        type="text" 
                                        placeHolder="Nom de la salle"
                                        size="sm"
                                        isRequired
                                        value="{{$model->name}}"
                                    >
                                    </x-MyInputField>
                                </div>
                                <!-- End Form -->                                      
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </div>
                <!-- End Row -->
                </form>
            <!-- End Form -->
        </div>
    </div>
</div>
     

