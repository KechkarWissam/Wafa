<?php

namespace App\Modules\Roles\controllers\logic;

use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Modules\Roles\requests\UpdateRoleRequest;
use App\Http\Trait\requestTrait;
use Spatie\Permission\Models\Role;

class UpdateRole
{
    use requestTrait;

    use AsAction;

    public function handle(UpdateRoleRequest $request,$id)
    {
      // dd($request->all());
      // $model = $this->handleUpdate($request,Product::class,$id);
      $model=Role::where('id',$id)->first();
      $model->update($request->only('name'));
      $model->syncPermissions($request->permissions);

      $model ? Session::flash('message','Rôle mis à jour avec succès') : Session::flash('message','Error');

      return redirect()->route('roles.index');

    }
}
