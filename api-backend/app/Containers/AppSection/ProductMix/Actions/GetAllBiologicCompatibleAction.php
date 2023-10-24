<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ProductMix\Tasks\GetAllBiologicCompatibleTask;
use App\Containers\AppSection\ProductMix\UI\API\Requests\GetAllBiologicCompatibleRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllBiologicCompatibleAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllBiologicCompatibleRequest $request): mixed
    {
        return app(GetAllBiologicCompatibleTask::class)->run();
    }
}
