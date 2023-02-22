<?php

namespace App\Modules\Products\controllers\logic;

use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Modules\Products\models\Product;
use App\Modules\Products\requests\UpdateProductRequest;
use App\Http\Trait\requestTrait;

class UpdateProduct
{
    use requestTrait;

    use AsAction;

    public function handle(UpdateProductRequest $request,$id)
    {
      // dd($request->all());
      $model = $this->handleUpdate($request,Product::class,$id);
      $model ? Session::flash('message','Produit mis à jour avec succès') : Session::flash('message','Error');

      return redirect()->route('products.index');

    }
}
