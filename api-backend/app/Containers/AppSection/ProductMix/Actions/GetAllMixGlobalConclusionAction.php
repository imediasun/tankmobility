<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ProductMix\Tasks\GetAllMixGlobalConclusionTask;
use App\Containers\AppSection\ProductMix\UI\API\Requests\GetAllMixGlobalConclusionRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllMixGlobalConclusionAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllMixGlobalConclusionRequest $request): mixed
    {
        return app(GetAllMixGlobalConclusionTask::class)->run();
    }
}
