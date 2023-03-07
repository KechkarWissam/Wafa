
    <a class="btn btn-primary btn-block"
       data-toggle="modal"
        href="javascript:;"
        data-target="#modals-edit-model-user-{{$model->id}}">
        <i class="fas fa-edit"></i>
    </a>
    <a class="btn btn-danger btn-block"
       data-toggle="modal"
        href="javascript:;"
         data-target="#modals-archive-model-user-{{$model->id}}">
        <i class="fas fa-trash"></i> 
    </a>

@include('Users::modals.delete')
@include('Users::modals.edit')