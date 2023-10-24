<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Facades\DB;

class AssignCountriesToUserTask extends ParentTask
{
    /**
     * @param User $user
     * @param array $countries
     */
    public function run(User $user, array $countries)
    {
        foreach($countries as $country){
            DB::connection('pgsql')->table('user_countries')->insert(['user_id' => $user->id,'linked_country' => $country]);
        }
    }
}
