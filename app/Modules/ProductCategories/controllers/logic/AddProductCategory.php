<?php

namespace App\Modules\ProductCategories\controllers\logic;

use App\Http\Trait\requestTrait;
use App\Modules\ProductCategories\models\ProductCategory;
use App\Modules\ProductCategories\requests\CreateProductCategoryRequest;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class AddProductCategory
{
    use requestTrait;

    use AsAction;

    public function handle(CreateProductCategoryRequest $request)
    {
      // dd($request->all());
      $model = $this->handleCreate($request,ProductCategory::class);
      
      $model ? Session::flash('message','Catégorie ajoutée avec succès') : Session::flash('message','Error');

      return redirect()->route("productcategories.index");

    }

}
