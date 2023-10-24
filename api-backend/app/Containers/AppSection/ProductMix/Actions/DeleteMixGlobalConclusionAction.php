<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use App\Containers\AppSection\ProductMix\Tasks\DeleteMixGlobalConclusionTask;
use App\Containers\AppSection\ProductMix\UI\API\Requests\DeleteMixGlobalConclusionRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteMixGlobalConclusionAction extends ParentAction
{
    /**
     * @param DeleteMixGlobalConclusionRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteMixGlobalConclusionRequest $request): int
    {
        return app(DeleteMixGlobalConclusionTask::class)->run($request->id);
    }
}
