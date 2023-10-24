<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ProductMix\Models\ProductMix;
use App\Containers\AppSection\ProductMix\Tasks\UpdateProductMixTask;
use App\Containers\AppSection\ProductMix\UI\API\Requests\UpdateProductMixRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateProductMixAction extends ParentAction
{
    /**
     * @param UpdateProductMixRequest $request
     * @return ProductMix
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateProductMixRequest $request): ProductMix
    {
        $data = $request->sanitizeInput([
            'confidential_mix',
            'exceptionaly',
            'product_list_id',
        ]);

        return app(UpdateProductMixTask::class)->run($data, $request->id);
    }
}
