<div class="modal fade" id="modals-edit-model-product-category-{{$model->id}}" tabindex="-1" aria-labelledby="modals-edit-model-product-category-{{$model->id}}" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Form -->
                <form action="{{ route('productcategories.update',['id'=>$model->id])}}"
                    method="POST" id="product-category-form" >
                    @csrf
                    @method('patch')
                     <div class="modal-header">
                        <h5 class="modal-title" id="modals-edit-model-product-category-{{$model->id}}">Modifier une salle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        </div>
                        <div class="modal-body">
                               <!-- Form -->
                                <div class="form-group mb-4">
                                    @include('admin.layouts.components.my-input-field',
                                        [
                                            'id' => 'name',
                                            'name' => 'name',
                                            'label' => 'Nom de la catégorie',
                                            'type' => 'text',
                                            'placeholder' => "Nom",
                                            'required'=>true,
                                            'size'=>'sm',
                                            'value'=>$model->name
                                        ]
                                    )
                                </div>
                                <div class="form-group  mb-4">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="description" name="description" class="form-control form-control-title" placeholder="Description" rows="2">{{$model->description}}</textarea>
                                </div>
                                <div class="form-group mb-4">
                                    @include('admin.layouts.components.my-select',
                                        [
                                            'data' => $categories,
                                            'label' => 'Catégorie principale',
                                            'name' => 'main_category_id',
                                            'placeholder' => "sélectionner une catégorie",
                                            'required'=>false,
                                            'model'=>$model->main_category_id
                                        ]
                                    )
                                </div>
                                <!-- End Form -->                                      
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </div>
                <!-- End Row -->
                </form>
            <!-- End Form -->
        </div>
    </div>
</div>
     

