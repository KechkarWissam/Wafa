<?php

namespace App\Modules\Products\controllers\logic;

use App\Http\Trait\requestTrait;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Modules\Products\models\Product;
use App\Modules\Products\requests\CreateProductRequest;

class AddProduct
{
    use requestTrait;

    use AsAction;

    public function handle(CreateProductRequest $request)
    {
      // dd('check');
      // dd($request->all());
      $model = $this->handleCreate($request,Product::class);
      
      $model ? Session::flash('message','Produit ajouté avec succès') : Session::flash('message','Error');

      return redirect()->route("products.index");

    }

}
