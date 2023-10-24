<?php

namespace App\Containers\AppSection\Authorization\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreateRoleTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class AuthorizationRolesSeeder_2 extends ParentSeeder
{
    /**
     * @throws CreateResourceFailedException
     */
    public function run(): void
    {
        // Default Roles for every Guard ----------------------------------------------------------------
        foreach (array_keys(config('auth.guards')) as $guardName) {
            app(CreateRoleTask::class)->run(config('appSection-authorization.basf_admin_role'), 'Administrator', 'Administrator Role', $guardName);
            app(CreateRoleTask::class)->run(config('appSection-authorization.basf_country_admin_role'), 'Country Administrator', 'Country Administrator Role', $guardName);
            app(CreateRoleTask::class)->run(config('appSection-authorization.lab_owner_role'), 'Laborotory owner', 'Laborotory owner', $guardName);
            app(CreateRoleTask::class)->run(config('appSection-authorization.basf_user_role'), 'Basf user', 'Basf user owner', $guardName);
        }
    }
}
