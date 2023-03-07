<?php

namespace App\Modules\Roles\controllers;

use App\Helpers\GenerateHeader;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class ShowRolesPage
{
    use AsAction;
    public function asController(Request $request): View|Factory|JsonResponse|Exception
    {
        // dd($request);
        if ($request->ajax())  return $this->genAjaxResponse();

        $header = GenerateHeader::run('Rôles', 'icon-user', 'blue', 'Liste des rôles');

        $btn_add='Roles::actions.btn-add';
        $permissions=Permission::query()->get();
        $roles=Role::query()->get();
        $heads = [
            ['label' => 'Id'],
            ['label' => 'Nom'],
            ['label' => 'Permissions'],
            ['label' => 'Date de création'],
            ['label' => 'Actions', 'no-export' => true],
        ];

        $config = [
            'ajax' => route("roles.index"),
            'order' => [[0, 'asc']],
            'columns' => [
                ['name' => 'id','data'=>'id'],
                ['name' => 'name','data'=>'name'],
                ['name' => 'permissions','data'=>'permissions'],
                ['name' => 'created_at','data'=>'created_at'],
                ['name' => 'action','data'=>'action']
            ],
        ];


        return view('Roles::index',compact('btn_add','header','permissions','roles'))
            ->with([
                'heads' => $heads,
                'table_id' => "roles",
                'config' => $config,
                'page_title'=>'Rôles'
            ]);
    }

    public function authorize()
    {
               return true;
        // return auth()->user()->can('view_Products');
    }

    private function genAjaxResponse(): JsonResponse|Exception
    {
        $permissions=Permission::query()->get();
        $data = Role::query()->orderby('created_at', 'desc');
        // ->with('category')
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function ($model) use ($permissions){
                return view( 'Roles::actions.btn',compact('model','permissions'));
            })
            ->addColumn('responsive', "")
            ->addColumn('created_at', function ($param) {

                return \Carbon\Carbon::parse($param->created_at)->setTimezone(\Carbon\Carbon::now(+1)->timezoneName)->format("d/m/Y");

            })
            ->addColumn('permissions', function ($param) {
               $text = "<a data-toggle=\"modal\" href=\"javascript:void(0)\" data-target=\"#modals-detail-role-$param->id\">";
               $count = 0;
               foreach ($param->permissions as $permission) {
                   $count++;
                   $text = $text . '<span  class="badge bg-primary text-primary">' . $permission->name . '</span> ';
                   if($count>8) {
                       $text = $text . '...';
                       break;
                   }
               }

               return $text."</a>";
            })
            ->rawColumns(['action', 'responsive', 'created_at','permissions',])
            ->make();
    }
}
