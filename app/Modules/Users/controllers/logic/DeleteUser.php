<?php

namespace App\Modules\Users\controllers\logic;

use App\Http\Trait\requestTrait;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Modules\Users\models\User;

class DeleteUser
{
    use requestTrait;

    use AsAction;

    public function handle($id){
        $res = $this->handleDelete(User::class,$id);
        $res ? 
        Session::flash('message','Utilisateur supprimé avec succès')
        : 
        Session::flash('message','Error');

        return redirect()->route('users.index');
}
}
