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
class TestsProductsList extends ParentModel
{
    /**
     * @OA\Property(
     *     title="object",
     *     format="string",
     *     default="TestsProductsList"
     * )
     *
     * @var string
     */
    private $object;


    protected $fillable = [
        'products_list_id', 'test_id'
    ];

    protected $hidden = [

    ];

    protected $table = 'tests_products_lists';

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'TestsProductsList';

}

