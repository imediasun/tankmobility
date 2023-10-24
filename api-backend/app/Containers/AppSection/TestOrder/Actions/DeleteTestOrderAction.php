<?php

namespace App\Containers\AppSection\TestOrder\Actions;

use App\Containers\AppSection\TestOrder\Tasks\DeleteTestOrderTask;
use App\Containers\AppSection\TestOrder\UI\API\Requests\DeleteTestOrderRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteTestOrderAction extends ParentAction
{
    /**
     * @param DeleteTestOrderRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteTestOrderRequest $request): int
    {
        return app(DeleteTestOrderTask::class)->run($request->id);
    }
}
