<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ProductMix\Models\ProductMix;
use App\Containers\AppSection\ProductMix\Tasks\CreateProductMixTask;
use App\Containers\AppSection\ProductMix\UI\API\Requests\CreateProductMixRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateProductMixAction extends ParentAction
{
    /**
     * @param CreateProductMixRequest $request
     * @return ProductMix
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(array $mixData): ProductMix
    {
        return app(CreateProductMixTask::class)->run($mixData);
    }
}
