<?php

namespace App\Containers\AppSection\TestOrder\Models;

use App\Containers\AppSection\Product\Models\ProductsList;
use App\Ship\Parents\Models\Model as ParentModel;

/**
 * @OA\Schema(
 *     title="Test",
 *     description="Test model",
 * )
 */
class Test extends ParentModel
{
    /**
     * @OA\Property(
     *     title="object",
     *     format="string",
     *     default="Test"
     * )
     *
     * @var string
     */
    private $object;

    /**
     * @OA\Property(
     * property="productsListData",
     * type="array",
     * @OA\Items(ref="#/components/schemas/ProductsList"),
     *),
     * *
     * @var array
     */
    private $products_list;

    protected $fillable = [
        'products_list_ids', 'date_of_test', 'volume_in_liters', 'segment',
        'observe_order', 'validator', 'comment', 'rejected', 'validated'
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'products_list_ids' => 'array'
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Test';

    public function products()
    {
        return $this->hasMany(ProductsList::class, 'foreign_key', 'products_list_id');
    }

    public function productsLists()
    {
        return $this->hasManyThrough(ProductsList::class, TestsProductsList::class, 'test_id', 'id', 'id', 'products_list_id');

    }

    public function testRequester()
    {
        return $this->hasOneThrough(Order::class, TestOrder::class, 'test_id', 'id', 'id', 'order_id');
    }


}

