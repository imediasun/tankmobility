<?php

namespace App\Containers\AppSection\TestOrder\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use App\Containers\AppSection\TestOrder\Models\Order;
use App\Containers\AppSection\TestOrder\Models\Test;
/**
 * @OA\Schema(
 *     title="TestOrder",
 *     description="TestOrder model",
 * )
 */

class TestOrder extends ParentModel
{
    protected $fillable = [
        'test_id','order_id'
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'tests_ids' => 'string'
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'TestOrder';

    public function order()
    {
        return $this->belongsTo(Order::class, 'id', 'order_id');
    }

    public function test()
    {
        return $this->belongsTo(Test::class, 'id', 'test_id');
    }

}
