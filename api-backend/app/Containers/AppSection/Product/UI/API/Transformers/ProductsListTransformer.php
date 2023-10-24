<?php

namespace App\Containers\AppSection\Product\UI\API\Transformers;

use App\Containers\AppSection\Product\Models\ProductsList;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ProductsListTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(ProductsList $productslist): array
    {

        $response = [
            'object' => $productslist->getResourceKey(),
            'id' => $productslist->getHashedKey(),
            'product_id' => $productslist->product_id,
            'unit' => $productslist->unit,
            'comment' => $productslist->comment,
            'dose' => $productslist->dose,
            'quantity' => $productslist->quantity,
        ];

        return $response;
    }
}
