<div class="modal fade" id="modals-edit-model-product-{{$model->id}}" tabindex="-1" aria-labelledby="modals-edit-model-product-{{$model->id}}" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Form -->
                <form action="{{ route('products.update',['id'=>$model->id])}}"
                    method="POST" id="product-form" >
                    @csrf
                    @method('patch')
                     <div class="modal-header">
                        <h5 class="modal-title" id="modals-edit-model-product-{{$model->id}}">Modifier un produit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        </div>
                        <div class="modal-body"> 
                         <!-- Form -->
                                <div class="form-group mb-4">
                                    @include('admin.layouts.components.my-input-field',
                                        [
                                            'id' => 'code_product',
                                            'name' => 'code_product',
                                            'label' => 'Code produit',
                                            'type' => 'text',
                                            'placeholder' => "Code produit",
                                            'required'=>true,
                                            'size'=>'sm',
                                            'value'=>$model->code_product
                                        ]
                                    )
                                </div>
                                <div class="form-group  mb-4">
                                    <label for="designation" class="form-label">Désignation<a style="color: red">*</a> </label>
                                    <textarea required id="designation" name="designation" class="form-control form-control-title" placeholder="Désignation" rows="2">{{$model->designation}}</textarea>
                                </div>
                                <div class="form-group row mb-4">
                                    <div class="col-6">
                                        @include('admin.layouts.components.my-input-field',
                                            [
                                                'id' => 'ply',
                                                'name' => 'ply',
                                                'label' => 'Plis',
                                                'type' => 'number',
                                                'placeholder' => "Plis",
                                                'required'=>true,
                                                'size'=>'sm',
                                                'value'=>$model->ply
                                            ]
                                        )
                                    </div>
                                    <div class="col-6">
                                        @include('admin.layouts.components.my-input-field',
                                            [
                                                'id' => 'quantity',
                                                'name' => 'quantity',
                                                'label' => 'Quantité ',
                                                'type' => 'number',
                                                'placeholder' => "Quantité ",
                                                'required'=>true,
                                                'size'=>'sm',
                                                'value'=>$model->quantity
                                            ]
                                        )
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <div class="col-6">
                                        @include('admin.layouts.components.my-input-field',
                                            [
                                                'id' => 'width',
                                                'name' => 'width',
                                                'label' => ' La laize',
                                                'type' => 'number',
                                                'placeholder' => "La laize",
                                                'required'=>false,
                                                'size'=>'sm',
                                                'value'=>$model->width
                                            ]
                                        )
                                    </div>
                                    <div class="col-6">
                                        @include('admin.layouts.components.my-input-field',
                                            [
                                                'id' => 'height',
                                                'name' => 'height',
                                                'label' => "L'hauteur",
                                                'type' => 'number',
                                                'placeholder' => "L'hauteur",
                                                'required'=>false,
                                                'size'=>'sm',
                                                'value'=>$model->height
                                            ]
                                        )
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    @include('admin.layouts.components.my-select',
                                        [
                                            'data' => $categories,
                                            'label' => 'Catégorie',
                                            'name' => 'product_category_id',
                                            'placeholder' => "sélectionner une catégorie",
                                            'required'=>true,
                                            'model'=>$model->product_category_id
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
     

