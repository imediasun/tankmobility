<?php

namespace App\Containers\AppSection\TestOrder\Actions;

use App\Containers\AppSection\TestOrder\Models\TestOrder;
use App\Containers\AppSection\TestOrder\Tasks\FindTestOrderByIdTask;
use App\Containers\AppSection\TestOrder\UI\API\Requests\FindTestOrderByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindTestOrderByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindTestOrderByIdRequest $request): TestOrder
    {
        return app(FindTestOrderByIdTask::class)->run($request->id);
    }
}
