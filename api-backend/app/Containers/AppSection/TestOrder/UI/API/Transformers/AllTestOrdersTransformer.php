<?php

namespace App\Containers\AppSection\TestOrder\UI\API\Transformers;

use App\Containers\AppSection\TestOrder\Models\TestOrder;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use App\Containers\AppSection\TestOrder\Actions\FindTestByOrderIdAction;
use App\Containers\AppSection\TestOrder\UI\API\Transformers\TestTransformer;

class AllTestOrdersTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(TestOrder $testOrder): array
    {

        $response = [
            'object' => $testOrder->getResourceKey(),
            'id' => $testOrder->getHashedKey(),
            'tests' => app(FindTestByOrderIdAction::class)->run($testOrder->getHashedKey())


        ];


        return  $response;

    }
}
