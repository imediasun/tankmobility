<?php

namespace App\Containers\AppSection\ProductMix\Models;

use App\Ship\Parents\Models\Model as ParentModel;

/**
 * @OA\Schema(
 *     title="ProductMix",
 *     description="ProductMix model",
 * )
 */

class ProductMix extends ParentModel
{
    protected $fillable = [
        'confidential_mix',
        'exceptionaly',
        'products_list_ids',
    ];

    protected $table = 'product_mixes';
    protected $casts = [
        'confidential_mix' => 'boolean',
        'exceptionaly' => 'boolean',
        'products_list_ids' => 'array'
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'ProductMix';


}
