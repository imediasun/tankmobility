<?php

namespace App\Containers\AppSection\Product\Actions;

use App\Containers\AppSection\Product\Tasks\DeleteProductsListTask;
use App\Containers\AppSection\Product\UI\API\Requests\DeleteProductsListRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteProductsListAction extends ParentAction
{
    /**
     * @param DeleteProductsListRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteProductsListRequest $request): int
    {
        return app(DeleteProductsListTask::class)->run($request->id);
    }
}
