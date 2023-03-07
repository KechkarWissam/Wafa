<?php

namespace App\Modules\Users\controllers\logic;

use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Modules\Users\models\User;
use App\Modules\Users\requests\UpdateUserRequest;
use App\Http\Trait\requestTrait;
use Illuminate\Support\Facades\Hash;

class UpdateUser
{
    use requestTrait;

    use AsAction;

    public function handle(UpdateUserRequest $request,$id)
    {
      // dd($request->all());
      // $model = $this->handleUpdate($request,User::class,$id);
      $model=User::where('id',$id)->first();
      abort_if(auth()->id() == $model->id,401);

      $model->update($this->getUserFields($request));
      $model->roles()->sync($request->roles);

      if ($request->password != null) {
          $model->update([
              'password' => Hash::make($request->password)
          ]);
      }

      $model ? Session::flash('message','Utilisateur mis à jour avec succès') : Session::flash('message','Error');

      return redirect()->route('users.index');

    }
    private function getUserFields($request): array
    {
        return $request->only(['first_name', 'last_name', 'username', 'email', 'phone']);
    }
}
