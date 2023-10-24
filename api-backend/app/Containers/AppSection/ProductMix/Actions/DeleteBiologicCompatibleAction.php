<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use App\Containers\AppSection\ProductMix\Tasks\DeleteBiologicCompatibleTask;
use App\Containers\AppSection\ProductMix\UI\API\Requests\DeleteBiologicCompatibleRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteBiologicCompatibleAction extends ParentAction
{
    /**
     * @param DeleteBiologicCompatibleRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteBiologicCompatibleRequest $request): int
    {
        return app(DeleteBiologicCompatibleTask::class)->run($request->id);
    }
}
