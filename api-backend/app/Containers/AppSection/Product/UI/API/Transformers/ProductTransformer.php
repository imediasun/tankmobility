<?php

namespace App\Containers\AppSection\Product\UI\API\Transformers;

use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ProductTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Product $product): array
    {
        $response = [
            'object' => $product->getResourceKey(),
            'id' => $product->getHashedKey(),
            'name' => $product->name,
            'code_basf' => $product->code_basf,
            'product_type_id' => $product->product_type_id,
            'family' => $product->family,
            'sot_using_prod_date' => $product->sot_using_prod_date,
            'actual' => $product->actual,
        ];

        return  $response;
    }
}
