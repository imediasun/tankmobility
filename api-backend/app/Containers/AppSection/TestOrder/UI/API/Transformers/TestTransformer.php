<?php

namespace App\Containers\AppSection\TestOrder\UI\API\Transformers;

use App\Containers\AppSection\TestOrder\Models\Test;
use App\Containers\AppSection\Product\Models\ProductsList;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class TestTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Test $testData): array
    {

        //$productsListData = ProductsList::whereIn('id',json_decode($testData->products_list_ids))->get();

        $response = [
                'object' => $testData->getResourceKey(),
                'id' => $testData->getHashedKey(),
                'products_list' => [],//$productsListData,
                'date_of_test' => $testData->date_of_test,
                'volume_in_liters' => $testData->volume_in_liters,
                'segment' => $testData->segment,
                'comment' => $testData->comment,
                'observe_order' => $testData->observe_order,
                'requester' => $testData->requester,
                'updated_at' => $testData->updated_at,
                'created_at' => $testData->created_at,
                'readable_created_at' => $testData->created_at->diffForHumans(),
                'readable_updated_at' => $testData->updated_at->diffForHumans(),
            ];

        return  $response;

    }
}
