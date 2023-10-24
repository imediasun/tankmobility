<?php

namespace App\Containers\AppSection\Product\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Product\Models\ProductsList;
use App\Containers\AppSection\Product\Tasks\UpdateProductsListTask;
use App\Containers\AppSection\Product\UI\API\Requests\UpdateProductsListRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateProductsListAction extends ParentAction
{
    /**
     * @param UpdateProductsListRequest $request
     * @return ProductsList
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateProductsListRequest $request): ProductsList
    {
        $data = $request->sanitizeInput([
            'product_id',
            'unit',
            'comment',
            'dose',
            'quantity',
        ]);

        return app(UpdateProductsListTask::class)->run($data, $request->id);
    }
}
