<?php

namespace App\Containers\AppSection\Product\Models;

use App\Ship\Parents\Models\Model as ParentModel;

/**
 * @OA\Schema(
 *     title="ProductType",
 *     description="ProductType model",
 * )
 */

class ProductType extends ParentModel
{
    protected $fillable = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'ProductType';
}
