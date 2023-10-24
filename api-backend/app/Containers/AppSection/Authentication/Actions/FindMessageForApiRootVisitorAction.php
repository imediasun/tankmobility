<?php

namespace App\Containers\AppSection\Authentication\Actions;

use App\Ship\Parents\Actions\Action;

class FindMessageForApiRootVisitorAction extends Action
{
    public function run(): array
    {
        return ['Welcome to Apiato BASF'];
    }
}
