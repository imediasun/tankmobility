<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use App\Containers\AppSection\ProductMix\Tasks\DeleteMixPhysicalAspectsTask;
use App\Containers\AppSection\ProductMix\UI\API\Requests\DeleteMixPhysicalAspectsRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteMixPhysicalAspectsAction extends ParentAction
{
    /**
     * @param DeleteMixPhysicalAspectsRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteMixPhysicalAspectsRequest $request): int
    {
        return app(DeleteMixPhysicalAspectsTask::class)->run($request->id);
    }
}
