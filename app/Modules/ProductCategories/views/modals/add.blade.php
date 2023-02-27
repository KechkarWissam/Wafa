<div class="modal fade" id="modals-add-model-product-category" tabindex="-1" aria-labelledby="modals-add-model-product-category" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Form -->
                <form action="{{ route('productcategories.store')}}"
                    method="POST" id="product-category-form" >
                    @csrf
                     <div class="modal-header">
                        <h5 class="modal-title" id="modals-add-model-product-category">Ajouter une catégorie</h5>
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
                                            'size'=>'sm'
                                        ]
                                    )
                                </div>
                                <div class="form-group  mb-4">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="description" name="description" class="form-control form-control-title" placeholder="Description" rows="2"></textarea>
                                </div>
                                <div class="form-group mb-4">
                                    @include('admin.layouts.components.my-select',
                                        [
                                            'data' => $categories,
                                            'label' => 'Catégorie principale',
                                            'name' => 'main_category_id',
                                            'placeholder' => "sélectionner une catégorie",
                                            'required'=>false,
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
@push('js')
<script>
    //$(document).on('ready', function () {
     // $('#main_category_id').val('');
    //$("#main_category_id").select2("val", "");
   // })  
</script>
@endpush