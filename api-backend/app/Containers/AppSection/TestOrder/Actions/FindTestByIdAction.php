<?php

namespace App\Containers\AppSection\TestOrder\Actions;

use App\Containers\AppSection\TestOrder\Models\Test;
use App\Containers\AppSection\TestOrder\Tasks\FindTestByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindTestByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run($id): Test
    {
        return app(FindTestByIdTask::class)->run($id);
    }
}
