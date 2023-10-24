<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ProductMix\Tasks\GetAllMixPhysicalAspectsTask;
use App\Containers\AppSection\ProductMix\UI\API\Requests\GetAllMixPhysicalAspectsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllMixPhysicalAspectsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllMixPhysicalAspectsRequest $request): mixed
    {
        return app(GetAllMixPhysicalAspectsTask::class)->run();
    }
}
