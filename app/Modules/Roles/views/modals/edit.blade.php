<div class="modal fade" id="modals-edit-model-role-{{$model->id}}" tabindex="-1" aria-labelledby="modals-edit-model-role-{{$model->id}}" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Form -->
                <form action="{{ route('roles.update',['id'=>$model->id])}}"
                    method="POST" id="role-form" >
                    @csrf
                    @method('patch')
                     <div class="modal-header">
                        <h5 class="modal-title" id="modals-edit-model-role-{{$model->id}}">Modifier un produit</h5>
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
                                            'label' => 'Nom',
                                            'type' => 'text',
                                            'placeholder' => "Nom",
                                            'required'=>true,
                                            'size'=>'sm',
                                            'value'=>$model->name
                                        ]
                                    )
                                </div>
                                <div class="form-group mb-4">
                                   <label for="permissions" class="form-label">Permissions
                                            <a style="color: red">*</a>
                                    </label>
                                    <!-- Select -->
                                    {{-- {{  in_array($permission,$model->permissions)?'selected':'' }} --}}
                                         <select class="select2" id="permissions" name="permissions[]" required multiple="multiple" data-placeholder="sélectionner une permission" style="width: 100%;">
                                           @foreach($permissions as $permission)
                                                    <option   value="{{$permission->id}}">{{$permission->name}}</option>
                                           @endforeach
                                        </select>
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
     

