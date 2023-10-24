<?php

namespace App\Containers\AppSection\Product\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Product\Tasks\GetAllProductsListTask;
use App\Containers\AppSection\Product\UI\API\Requests\GetAllProductsListRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllProductsListAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllProductsListRequest $request): mixed
    {
        return app(GetAllProductsListTask::class)->run();
    }
}
