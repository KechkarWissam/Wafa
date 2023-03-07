<?php

namespace App\Modules\Users\controllers;

use App\Helpers\GenerateHeader;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Modules\Users\models\User;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class ShowUsersPage
{
    use AsAction;
    public function asController(Request $request): View|Factory|JsonResponse|Exception
    {
        // dd($request);
        if ($request->ajax())  return $this->genAjaxResponse();

        $header = GenerateHeader::run('Utilisateurs', 'icon-user', 'blue', 'Liste des utilisateurs');

        $roles=Role::query()->get();

        $btn_add='Users::actions.btn-add';
        $heads = [
            ['label' => 'Id'],
            ['label' => 'Nom'],
            ['label' => 'Téléphone'],
            ['label' => 'Email'],
            ['label' => 'Rôle'],
            ['label' => 'Date de création'],
            ['label' => 'Actions', 'no-export' => true],
        ];

        $config = [
            'ajax' => route("users.index"),
            'order' => [[0, 'asc']],
            'columns' => [
                ['name' => 'id','data'=>'id'],
                ['name' => 'full_name','data'=>'full_name'],
                ['name' => 'phone','data'=>'phone'],
                ['name' => 'email','data'=>'email'],
                ['name' => 'role','data'=>'role'],
                ['name' => 'created_at','data'=>'created_at'],
                ['name' => 'action','data'=>'action']
            ],
        ];


        return view('Users::index',compact('btn_add','header','roles'))
            ->with([
                'heads' => $heads,
                'table_id' => "users",
                'config' => $config,
                'page_title'=>'Utilisateurs'
            ]);
    }

    public function authorize()
    {
               return true;
        // return auth()->user()->can('view_Products');
    }

    private function genAjaxResponse(): JsonResponse|Exception
    {
        $roles=Role::query()->get();
        $data = User::query()->orderby('created_at', 'desc');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function ($model) use ($roles){
                return view( 'Users::actions.btn',compact('model','roles'));
            })
            ->addColumn('responsive', "")
            ->addColumn('created_at', function ($param) {

                return \Carbon\Carbon::parse($param->created_at)->setTimezone(\Carbon\Carbon::now(+1)->timezoneName)->format("d/m/Y");

            })
            ->addColumn('role', function ($param) {

            //    return $param->role->name ;

            })
            ->rawColumns(['action', 'responsive', 'created_at','role'])
            ->make();
    }
}
