<div class="modal fade" id="modals-edit-model-user-{{$model->id}}" tabindex="-1" aria-labelledby="modals-edit-model-user-{{$model->id}}" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Form -->
                <form action="{{ route('users.update',['id'=>$model->id])}}"
                    method="POST" id="user-form" >
                    @csrf
                    @method('patch')
                     <div class="modal-header">
                        <h5 class="modal-title" id="modals-edit-model-user-{{$model->id}}">Modifier un utilisateur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        </div>
                        <div class="modal-body"> 
                         <!-- Form -->
                                <div class="form-group mb-4">
                                    @include('admin.layouts.components.my-input-field',
                                        [
                                            'id' => 'first_name',
                                            'name' => 'first_name',
                                            'label' => 'Nom',
                                            'type' => 'text',
                                            'placeholder' => "Nom",
                                            'required'=>true,
                                            'size'=>'sm',
                                            'value'=>$model->first_name
                                        ]
                                    )
                                </div>
                                <div class="form-group mb-4">
                                    @include('admin.layouts.components.my-input-field',
                                        [
                                            'id' => 'last_name',
                                            'name' => 'last_name',
                                            'label' => 'Prénom',
                                            'type' => 'text',
                                            'placeholder' => "Prénom",
                                            'required'=>true,
                                            'size'=>'sm',
                                            'value'=>$model->last_name
                                        ]
                                    )
                                </div>
                                <div class="form-group row mb-4">
                                    <div class="col-6">
                                        @include('admin.layouts.components.my-input-field',
                                            [
                                                'id' => 'phone',
                                                'name' => 'phone',
                                                'label' => 'Numéro de téléphone',
                                                'type' => 'text',
                                                'placeholder' => "Numéro de téléphone",
                                                'required'=>true,
                                                'size'=>'sm',
                                                'value'=>$model->phone
                                            ]
                                        )
                                    </div>
                                    <div class="col-6">
                                        @include('admin.layouts.components.my-input-field',
                                            [
                                                'id' => 'email',
                                                'name' => 'email',
                                                'label' => 'Email ',
                                                'type' => 'email',
                                                'placeholder' => "Email ",
                                                'required'=>true,
                                                'size'=>'sm',
                                                'value'=>$model->email
                                            ]
                                        )
                                    </div>
                                </div>
                               <div class="form-group row mb-4">
                                    <div class="col-6">
                                        @include('admin.layouts.components.my-input-field',
                                            [
                                                'id' => 'username',
                                                'name' => 'username',
                                                'label' =>  "Nom d'utilisateur",
                                                'type' => 'text',
                                                'placeholder' =>  "Nom d'utilisateur",
                                                'required'=>true,
                                                'size'=>'sm',
                                                'value'=>$model->username
                                            ]
                                        )
                                    </div>
                                    <div class="col-6">
                                        @include('admin.layouts.components.my-input-field',
                                             [
                                                'id' => 'password',
                                                'name' => 'password',
                                                'label' => ' Mot de passe',
                                                'type' => 'password',
                                                'placeholder' => "Mot de passe",
                                                'required'=>true,
                                                'size'=>'sm'
                                            ]
                                        )
                                    </div>
                                </div>
                                {{-- <div class="form-group mb-4">
                                    @include('admin.layouts.components.my-select',
                                        [
                                            'data' => $roles,
                                            'label' => 'Rôle',
                                            'name' => 'roles[]',
                                            'placeholder' => "sélectionner un rôle",
                                            'required'=>true,
                                        ]
                                    )
                                </div> --}}
                                  <div class="form-group mb-4">
                                    <label for="roles" class="form-label">Rôles
                                            <a style="color: red">*</a>
                                    </label>
                                    <!-- Select -->
                                         <select class="select2" id="roles" name="roles[]" required multiple="multiple" data-placeholder="sélectionner une permission" style="width: 100%;">
                                            @foreach($roles as $permission)
                                                    <option value="{{$permission->id}}">{{$permission->name}}</option>
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
     

