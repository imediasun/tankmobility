<?php

namespace App\Containers\AppSection\Product\Models;

use App\Ship\Parents\Models\Model as ParentModel;

/**
 * @OA\Schema(
 *     title="Product",
 *     description="Product model",
 * )
 */

class Product extends ParentModel
{
    protected $fillable = [
        'name',
        'code_basf',
        'product_type_id',
        'family',
        'sot_using_prod_date',
        'actual'
    ];

    protected $table = 'products';
    protected $casts = [
        'actual' => 'boolean',
        'sot_using_prod_date' => 'datetime',
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Product';
}
