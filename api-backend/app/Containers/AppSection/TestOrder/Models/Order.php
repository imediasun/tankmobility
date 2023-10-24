<?php

namespace App\Containers\AppSection\TestOrder\Models;

use App\Ship\Parents\Models\Model as ParentModel;

/**
 * @OA\Schema(
 *     title="Test",
 *     description="Test model",
 * )
 */

class Order extends ParentModel
{
    protected $fillable = [
        'requester'
    ];

    protected $hidden = [

    ];


    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Order';

}

