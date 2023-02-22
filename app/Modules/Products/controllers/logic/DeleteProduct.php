<?php

namespace App\Modules\Products\controllers\logic;

use App\Http\Trait\requestTrait;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Modules\Products\models\Product;

class DeleteProduct
{
    use requestTrait;

    use AsAction;

    public function handle($id){
        $res = $this->handleDelete(Product::class,$id);
        $res ? 
        Session::flash('message','Produit supprimé avec succès')
        : 
        Session::flash('message','Error');

        return redirect()->route('products.index');
}
}
