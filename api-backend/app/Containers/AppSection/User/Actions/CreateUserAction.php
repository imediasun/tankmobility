<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\Authentication\Tasks\CreateUserByCredentialsTask;
use App\Containers\AppSection\Authorization\Tasks\AssignRolesToUserTask;
use App\Containers\AppSection\Authorization\Tasks\FindRoleTask;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Facades\DB;

class CreateUserAction extends ParentAction
{

    public function run(array $data, $userRoleName): User
    {
        $this->userRoleName = $userRoleName;
        return DB::transaction(function () use ($data) {

            $this->user = app(CreateUserByCredentialsTask::class)->run($data);

            return $this->userAssigning();
        });
    }

    public function userAssigning(): User{
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $userRole = app(FindRoleTask::class)->run($this->userRoleName, $guardName);
            app(AssignRolesToUserTask::class)->run($this->user, $userRole);
        }

        $this->user->email_verified_at = now();
        $this->user->save();

        return $this->user;
    }

}
