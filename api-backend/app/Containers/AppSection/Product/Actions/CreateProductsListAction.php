<?php

namespace App\Containers\AppSection\Product\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Product\Models\ProductsList;
use App\Containers\AppSection\Product\Tasks\CreateProductsListTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateProductsListAction extends ParentAction
{
    /**
     * @param array $productsListArray
     * @return array
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(array $item): ProductsList
    {
        return app(CreateProductsListTask::class)->run($item);
    }
}
