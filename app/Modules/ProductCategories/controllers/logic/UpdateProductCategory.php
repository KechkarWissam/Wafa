<?php

namespace App\Modules\ProductCategories\controllers\logic;

use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Http\Trait\requestTrait;
use App\Modules\ProductCategories\models\ProductCategory;
use App\Modules\ProductCategories\requests\UpdateProductCategoryRequest;

class UpdateProductCategory
{
    use requestTrait;

    use AsAction;

    public function handle(UpdateProductCategoryRequest $request,$id)
    {
      // dd($request->all());
      $model = $this->handleUpdate($request,ProductCategory::class,$id);
      $model ? Session::flash('message','Catégorie mis à jour avec succès') : Session::flash('message','Error');

      return redirect()->route('productcategories.index');

    }
}
