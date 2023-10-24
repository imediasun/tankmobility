<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ProductMix\Tasks\GetAllProductMixesTask;
use App\Containers\AppSection\ProductMix\UI\API\Requests\GetAllProductMixesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllProductMixesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllProductMixesRequest $request): mixed
    {
        return app(GetAllProductMixesTask::class)->run();
    }
}
