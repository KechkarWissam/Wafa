
    <a class="btn btn-primary btn-block"
       data-bs-toggle="modal"
        href="javascript:;"
        data-bs-target="#modals-edit-model-product-{{$model->id}}">
        <i class="fas fa-edit"></i>
    </a>
    <a class="btn btn-danger btn-block"
       data-bs-toggle="modal"
        href="javascript:;"
         data-bs-target="#modals-archive-model-product-{{$model->id}}">
        <i class="fas fa-trash"></i> 
    </a>

{{-- @include('Products::modals.delete')
@include('Products::modals.edit') --}}