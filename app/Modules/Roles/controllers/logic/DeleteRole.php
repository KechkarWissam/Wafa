<?php

namespace App\Modules\Roles\controllers\logic;

use App\Http\Trait\requestTrait;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Role;

class DeleteRole
{
    use requestTrait;

    use AsAction;

    public function handle($id){
        $res = $this->handleDelete(Role::class,$id);
        $res ? 
        Session::flash('message','Rôle supprimé avec succès')
        : 
        Session::flash('message','Error');

        return redirect()->route('roles.index');
}
}
