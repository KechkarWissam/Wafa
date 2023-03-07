<?php

namespace App\Modules\Users\controllers\logic;

use App\Http\Trait\requestTrait;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Modules\Users\models\User;
use App\Modules\Users\requests\CreateUserRequest;
use Illuminate\Support\Facades\Hash;

class AddUser
{
    use requestTrait;

    use AsAction;

    public function handle(CreateUserRequest $request)
    {
      // dd('check');
      // dd($request->all());
      // $model = $this->handleCreate($request,User::class);
      $model=  User::create($this->getUserFields($request) + ['password' => Hash::make($request->password)]);
     
      $model->roles()->attach($request->roles);
      
      $model ? Session::flash('message','Utilisateur ajouté avec succès') : Session::flash('message','Error');

      return redirect()->route("users.index");

    }
    private function getUserFields($request): array
    {
        return $request->only(['first_name', 'last_name', 'username', 'email', 'phone']);
    }
}
