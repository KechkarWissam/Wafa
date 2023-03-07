<?php

namespace App\Modules\Roles\controllers\logic;

use App\Http\Trait\requestTrait;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Modules\Roles\requests\CreateRoleRequest;
use Spatie\Permission\Models\Role;

class AddRole
{
    use requestTrait;

    use AsAction;

    public function handle(CreateRoleRequest $request)
    {
      // dd('check');
      // dd($request->all());
      // $model = $this->handleCreate($request,Role::class);
      $model= Role::create(['name' => $request->name,'guard_name'=>'web']);
    
      $model ? Session::flash('message','Rôle ajouté avec succès') : Session::flash('message','Error');

      return redirect()->route("roles.index");

    }

}
