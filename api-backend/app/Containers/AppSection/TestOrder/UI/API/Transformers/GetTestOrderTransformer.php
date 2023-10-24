<?php

namespace App\Containers\AppSection\TestOrder\UI\API\Transformers;

use App\Containers\AppSection\TestOrder\DTO\FillInResultsFromServiceDTO;
use App\Containers\AppSection\Product\Models\ProductsList;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\TestOrder\Models\Test;

class GetTestOrderTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Test $testOrder): array
    {
        $requester = User::where('id',$testOrder->requester)->first();
        $response = [
            'object' => $testOrder->getResourceKey(),
            'id' => $testOrder->getHashedKey(),
            'order_id' =>$testOrder->order_id,
            'order_date' =>$testOrder->order_date,
            'readable_order_date' =>$testOrder->order_date->diffForHumans(),
            'products_list' => $testOrder->productsList,
            'date_of_test' => $testOrder->date_of_test,
            'volume_in_liters' => $testOrder->volume_in_liters,
            'segment' => $testOrder->segment,
            'comment' => $testOrder->comment,
            'observe_order' => $testOrder->observe_order,
            'requester' => $testOrder->requester,
            'updated_at' => $testOrder->updated_at,
            'created_at' => $testOrder->created_at,
            'order_requested_by' => $requester->name,
            'readable_created_at' => $testOrder->created_at->diffForHumans(),
            'readable_updated_at' => $testOrder->updated_at->diffForHumans(),
        ];

        return  $response;

    }
}
