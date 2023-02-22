<?php

namespace App\Modules\Products\controllers;

use App\Helpers\GenerateHeader;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Modules\Products\models\Product;
use Yajra\DataTables\Facades\DataTables;

class ShowProductsPage
{
    use AsAction;
    public function asController(Request $request): View|Factory|JsonResponse|Exception
    {
        // dd($request);
        if ($request->ajax())  return $this->genAjaxResponse();

        $header = GenerateHeader::run('Produits', 'icon-user', 'blue', 'Liste des produits');

        $btn_add='Products::actions.btn-add';
        $heads = [
            ['label' => 'Id'],
            ['label' => 'Code produit'],
            ['label' => 'Désignation'],
            ['label' => 'Plis'],
            ['label' => 'Dimension'],
            ['label' => 'Quantité'],
            ['label' => 'Date de création'],
            ['label' => 'Actions', 'no-export' => true],
        ];

        $config = [
            'ajax' => route("products.index"),
            'order' => [[0, 'asc']],
            'columns' => [
                ['name' => 'id','data'=>'id'],
                ['name' => 'code_product','data'=>'code_product'],
                ['name' => 'designation','data'=>'designation'],
                ['name' => 'ply','data'=>'ply'],
                ['name' => 'dimension','data'=>'dimension'],
                ['name' => 'quantity','data'=>'quantity'],
                ['name' => 'created_at','data'=>'created_at'],
                ['name' => 'action','data'=>'action']
            ],
        ];


        return view('Products::index',compact('btn_add','header'))
            ->with([
                'heads' => $heads,
                'table_id' => "Products_table",
                'config' => $config,
                'page_title'=>'Produits'
            ]);
    }

    public function authorize()
    {
               return true;
        // return auth()->user()->can('view_Products');
    }

    private function genAjaxResponse(): JsonResponse|Exception
    {
        $data = Product::query()->orderby('created_at', 'desc');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', 'Products::actions.btn')
            ->addColumn('responsive', "")
            ->addColumn('created_at', function ($param) {

                return \Carbon\Carbon::parse($param->created_at)->setTimezone(\Carbon\Carbon::now(+1)->timezoneName)->format("d/m/Y");

            })
            ->addColumn('dimension', function ($param) {

              if($param->width && $param->height)  return $param->width + 'cm' * $param->height + 'cm' ;
              if($param->width && !$param->height)  return $param->width + 'cm' ;
              if(!$param->width && !$param->height)  return '' ;

            })
            ->rawColumns(['action', 'responsive', 'created_at','dimension'])
            ->make();
    }
}
