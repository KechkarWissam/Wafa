<div class="modal fade" id="modals-add-model-classroom" tabindex="-1" aria-labelledby="modals-add-model-classroom" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Form -->
                <form action="{{ route('classrooms.store')}}"
                    method="POST" id="classroom-form" >
                    @csrf
                     <div class="modal-header">
                        <h5 class="modal-title" id="modals-add-model-classroom">Ajouter une salle</h5>
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