<?php

namespace App\Containers\AppSection\Laborotory\UI\API\Transformers;

use App\Containers\AppSection\Laborotory\Models\TestCompatibility;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class TestCompatibilityTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(TestCompatibility $testData): array
    {
        $response = [
                'object' => $testData->getResourceKey(),
                'id' => $testData->getHashedKey(),
                'test_id' => $testData->test_id,
                'compatibility' => json_decode($testData->compatibility),
                'updated_at' => $testData->updated_at,
                'created_at' => $testData->created_at,
                'readable_created_at' => $testData->created_at->diffForHumans(),
                'readable_updated_at' => $testData->updated_at->diffForHumans(),
            ];

        return  $response;

    }
}
