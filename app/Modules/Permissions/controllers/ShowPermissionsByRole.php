<?php

namespace App\Modules\Permissions\controllers;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

// use Spatie\Permission\Models\Role;

class ShowPermissionsByRole
{
    use AsAction;

    public function asController(Request $request,$role): View|Factory|JsonResponse|Exception
    {
        if ($request->ajax()) return $this->genAjaxResponse($role);
    }

    public function authorize()
    {
        return true;
        // return auth()->user()->can('view_permissions');
    }

    private function genAjaxResponse($role): JsonResponse|Exception
    {
        $role = Role::findByName($role);
        $data = $role->permissions()->orderby('created_at', 'desc');
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
