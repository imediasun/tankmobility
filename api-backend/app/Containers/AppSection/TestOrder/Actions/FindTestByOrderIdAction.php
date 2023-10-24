<?php

namespace App\Containers\AppSection\TestOrder\Actions;

use App\Containers\AppSection\TestOrder\Tasks\FindTestByOrderIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Database\Eloquent\Collection;

class FindTestByOrderIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run($id): Collection
    {
        return app(FindTestByOrderIdTask::class)->run($id);
    }
}
