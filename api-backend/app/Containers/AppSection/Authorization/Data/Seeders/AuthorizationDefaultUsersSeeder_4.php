<?php

namespace App\Containers\AppSection\Authorization\Data\Seeders;

use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;
use Throwable;
use App\Containers\AppSection\User\Actions\CreateUserAction;

class AuthorizationDefaultUsersSeeder_4 extends ParentSeeder
{
    /**
     * @throws CreateResourceFailedException
     * @throws Throwable
     */
    public function run(): void
    {
        // Default Users (with their roles) ---------------------------------------------
        $this->createSuperAdmin();
        $this->createCountryAdmin();
        $this->createBasfUser();
        $this->createLabOwner();
    }

    private function createSuperAdmin(): void
    {
        $userData = [
            'email' => 'basf_admin@gmail.com',
            'password' => 'sunimedia',
            'name' => 'imediasun lopushanskyi',
        ];

        $userRoleName = config('appSection-authorization.basf_admin_role');
        app(CreateUserAction::class)->run($userData,$userRoleName);
    }

    private function createCountryAdmin(): void
    {
        $userData = [
            'email' => 'basf_country_admin@gmail.com',
            'password' => 'sunimedia',
            'name' => 'country lopushanskyi',
        ];

        $userRoleName = config('appSection-authorization.basf_country_admin_role');
        app(CreateUserAction::class)->run($userData,$userRoleName);
    }

    private function createBasfUser(): void
    {
        $userData = [
            'email' => 'basf_user@gmail.com',
            'password' => 'sunimedia',
            'name' => 'devmagellan lopushanskyi',
        ];
        $userRoleName = config('appSection-authorization.basf_user_role');
        app(CreateUserAction::class)->run($userData,$userRoleName);
    }

    private function createLabOwner(): void
    {
        $userData = [
            'email' => 'lab_owner@gmail.com',
            'password' => 'sunimedia',
            'name' => 'backend lopushanskyi',
        ];

        $userRoleName = config('appSection-authorization.lab_owner_role');
        app(CreateUserAction::class)->run($userData,$userRoleName);
    }

}
