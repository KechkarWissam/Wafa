<?php

namespace App\Modules\ProductCategories\controllers;

use App\Helpers\GenerateHeader;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Modules\ProductCategories\models\ProductCategory;
use Yajra\DataTables\Facades\DataTables;

class ShowProductCategoriesPage
{
    use AsAction;
    public function asController(Request $request): View|Factory|JsonResponse|Exception
    {
        // dd($request);
        if ($request->ajax())  return $this->genAjaxResponse();

        $header = GenerateHeader::run('Catégories', 'icon-user', 'blue', 'Liste des catégories');

        $btn_add='ProductCategories::actions.btn-add';
        $categories=ProductCategory::query()->get();
        $heads = [
            ['label' => 'Id'],
            ['label' => 'Nom'],
            ['label' => 'Description'],
            ['label' => 'Catégorie principale'],
            ['label' => 'Date de création'],
            ['label' => 'Actions', 'no-export' => true],
        ];

        $config = [
            'ajax' => route("productcategories.index"),
            'order' => [[0, 'asc']],
            'columns' => [
                ['name' => 'id','data'=>'id'],
                ['name' => 'name','data'=>'name'],
                ['name' => 'description','data'=>'description'],
                ['name' => 'main_category','data'=>'main_category'],
                ['name' => 'created_at','data'=>'created_at'],
                ['name' => 'action','data'=>'action']
            ],
        ];


        return view('ProductCategories::index',compact('btn_add','header','categories'))
            ->with([
                'heads' => $heads,
                'table_id' => "product_categories",
                'config' => $config,
                'page_title'=>'Catégories'
            ]);
    }

    public function authorize()
    {
               return true;
        // return auth()->user()->can('view_Products');
    }

    private function genAjaxResponse(): JsonResponse|Exception
    {
        $categories=ProductCategory::query()->get();
        $data = ProductCategory::query()->orderby('created_at', 'desc');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function ($model) use ($categories){
                return view( 'ProductCategories::actions.btn',compact('model','categories'));
            })
            ->addColumn('responsive', "")
            ->addColumn('created_at', function ($param) {

                return \Carbon\Carbon::parse($param->created_at)->setTimezone(\Carbon\Carbon::now(+1)->timezoneName)->format("d/m/Y");

            })
            ->addColumn('main_category', function ($param) {

              if($param->main_category_id)  return $param->category->name ;
              else return '/';

            })
            ->rawColumns(['action', 'responsive', 'created_at','main_category'])
            ->make();
    }
}
