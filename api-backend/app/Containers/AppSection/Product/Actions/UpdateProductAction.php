<?php

namespace App\Containers\AppSection\Product\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\Product\Tasks\UpdateProductTask;
use App\Containers\AppSection\Product\UI\API\Requests\UpdateProductRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateProductAction extends ParentAction
{
    /**
     * @param UpdateProductRequest $request
     * @return Product
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateProductRequest $request): Product
    {
        $data = $request->sanitizeInput([
            'name',
            'code_basf',
            'product_type_id',
            'family',
            'sot_using_prod_date',
            'actual',
        ]);

        return app(UpdateProductTask::class)->run($data, $request->id);
    }
}
