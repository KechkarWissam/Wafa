<?php

namespace App\Modules\ProductCategories\controllers\logic;

use App\Http\Trait\requestTrait;
use App\Modules\ProductCategories\models\ProductCategory;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteProductCategory
{
    use requestTrait;

    use AsAction;

    public function handle($id){
        $res = $this->handleDelete(ProductCategory::class,$id);
        $res ? 
        Session::flash('message','Catégorie supprimée avec succès')
        : 
        Session::flash('message','Error');

        return redirect()->route('productcategories.index');
}
}
