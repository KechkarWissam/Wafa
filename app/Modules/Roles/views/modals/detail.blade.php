@php
   $heads_detail=[
            ['label' => 'Id'],
            ['label' => 'Nom'],
            ['label' => 'Date de création']];
    $config_detail=[
            'ajax' => route('permissions.permission.role',['role'=>$model->name]),
            'order' => [[0, 'asc']],
            'columns' => [
                ['name' => 'id','data'=>'id'],
                ['name' => 'name','data'=>'name'],
                ['name' => 'created_at','data'=>'created_at']
            ]
            ];
@endphp
<div class="modal fade" id="modals-detail-role-{{$model->id}}" tabindex="-1" aria-labelledby="modals-detail-role-{{$model->id}}" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modals-detail-role-{{$model->id}}">Detail de rôle {{$model->name}} ({{$model->permissions->count()}} permissions)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('admin.layouts.components.datatable',[
                               'id'=>"role_permissions-$model->id",
                               'heads'=>$heads_detail,
                               'config'=>$config_detail
                    ])           
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
        </div>
    </div>
</div>
