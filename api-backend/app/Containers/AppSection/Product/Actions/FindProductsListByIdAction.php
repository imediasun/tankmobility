<?php

namespace App\Containers\AppSection\Product\Actions;

use App\Containers\AppSection\Product\Models\ProductsList;
use App\Containers\AppSection\Product\Tasks\FindProductsListByIdTask;
use App\Containers\AppSection\Product\UI\API\Requests\FindProductsListByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindProductsListByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindProductsListByIdRequest $request): ProductsList
    {
        return app(FindProductsListByIdTask::class)->run($request->id);
    }
}
