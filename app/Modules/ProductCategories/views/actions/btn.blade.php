
    <a class="btn btn-primary btn-block"
       data-toggle="modal"
        href="javascript:;"
        data-target="#modals-edit-model-product-category-{{$model->id}}">
        <i class="fas fa-edit"></i>
    </a>
    <a class="btn btn-danger btn-block"
       data-toggle="modal"
        href="javascript:;"
        data-target="#modals-delete-model-product-category-{{$model->id}}">
        <i class="fas fa-trash"></i> 
    </a>

@include('ProductCategories::modals.delete')
@include('ProductCategories::modals.edit')