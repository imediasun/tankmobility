<?php

namespace App\Containers\AppSection\TestOrder\UI\API\Transformers;

use App\Containers\AppSection\TestOrder\DTO\CreateTestOrderFromServiceDTO;
use App\Containers\AppSection\Product\Models\ProductsList;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use App\Containers\AppSection\User\Models\User;

class TestOrderTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(CreateTestOrderFromServiceDTO $testOrder): array
    {
        $requester = User::where('id',$testOrder->orderData->requester)->first();

        $response = [
            'order_id' => $testOrder->testOrderData[0]->order_id,
            'order_created_at' => $testOrder->orderData->created_at,
            'order_requested_by' => $requester->name


        ];

        foreach ($testOrder->testData as $testData){
            $productsListData = ProductsList::whereIn('id',$testOrder->productsListIds)->get();
            $test_data [] = [
                'object' => $testData->getResourceKey(),
                'id' => $testData->getHashedKey(),
                'products_list' => $productsListData,
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
        }
        $response ['test_data'] = $test_data;

        return  $response;

    }
}
