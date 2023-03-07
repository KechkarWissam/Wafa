<?php

namespace App\Modules\Permissions\controllers;

use App\Helpers\GenerateHeader;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class ShowPermissionsPage
{
    use AsAction;
   
    public function asController(Request $request): View|Factory|JsonResponse|Exception
    {
        if ($request->ajax()) return $this->genAjaxResponse();

        $header = GenerateHeader::run('Permissions', 'icon-user', 'blue', 'Liste des permissions');

        $breadcrumbs = array(['name' => 'Liste des permissions', 'url' => route('permissions.index')]);
        // dd(Permission::query()->get());
        $heads = [
            ['label' => 'Id'],
            ['label' => 'Nom'],
            ['label' => 'Date de création'],
        ];

        $config = [
            'ajax' => route("permissions.index"),
            'order' => [[0, 'asc']],
            'columns' => [
            ['name' => 'id','data'=>'id'],
            ['name' => 'name','data'=>'name'],
            ['name' => 'created_at','data'=>'created_at'],
            ]
        ];

        return view('Permissions::index',compact('header','breadcrumbs'))
            ->with([
                'heads' => $heads,
                'table_id' => "permissions_table",
                'config' => $config,
                'page_title'=>'Permissions',

            ]);
    }

    public function authorize()
    {
        return true;
        // return auth()->user()->can('view_permissions');
    }

    private function genAjaxResponse(): JsonResponse|Exception
    {
        $data =  Permission::query()->orderby('created_at', 'desc');

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('responsive', "")
            ->addColumn('created_at', function ($param) {
                return \Carbon\Carbon::parse($param->created_at)->setTimezone(\Carbon\Carbon::now(+1)->timezoneName)->format("d/m/Y");
            })
            ->rawColumns(['responsive', 'created_at'])
            ->make();
    }
}
