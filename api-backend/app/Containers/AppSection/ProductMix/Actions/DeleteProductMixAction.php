<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use App\Containers\AppSection\ProductMix\Tasks\DeleteProductMixTask;
use App\Containers\AppSection\ProductMix\UI\API\Requests\DeleteProductMixRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteProductMixAction extends ParentAction
{
    /**
     * @param DeleteProductMixRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteProductMixRequest $request): int
    {
        return app(DeleteProductMixTask::class)->run($request->id);
    }
}
