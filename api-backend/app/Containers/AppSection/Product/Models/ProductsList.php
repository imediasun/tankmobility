<?php

namespace App\Containers\AppSection\Product\Models;

use App\Ship\Parents\Models\Model as ParentModel;

/**
 * @OA\Schema(
 *     title="ProductsList",
 *     description="ProductsList model",
 * )
 */

class ProductsList extends ParentModel
{

    /**
     * @OA\Property(
     *     title="id",
     *     format="integer",
     *     default="1"
     * )
     *
     * @var integer
     */

    private $id;

    /**
     * @OA\Property(
     *     title="product_id",
     *     format="integer",
     *     default="1"
     * )
     *
     * @var integer
     */

    private $product_id;

    /**
     * @OA\Property(
     *     title="code_basf",
     *     format="integer",
     *     default="1"
     * )
     *
     * @var integer
     */

    private $code_basf;

    /**
     * @OA\Property(
     *     title="unit",
     *     format="string",
     *     default="kg/ha"
     * )
     *
     * @var string
     */

    private $unit;

    /**
     * @OA\Property(
     *     title="comment",
     *     format="string",
     *     default="comment"
     * )
     *
     * @var string
     */

    private $comment;

    /**
     * @OA\Property(
     *     title="dose",
     *     format="string",
     *     default="0.5"
     * )
     *
     * @var float
     */

    private $dose;

    /**
     * @OA\Property(
     *     title="quantaty",
     *     format="string",
     *     default="1"
     * )
     *
     * @var integer
     */

    private $quantaty;

    /**
     * @OA\Property(
     *     title="entity",
     *     format="string",
     *     default="MIX"
     * )
     *
     * @var string
     */

    private $entity;

    /**
     * @OA\Property(
     *     title="created_at",
     *     format="datetime",
     *     default="2023-02-14T11:26:48.000000Z"
     * )
     *
     * @var datetime
     */

    private $created_at;

    /**
     * @OA\Property(
     *     title="updated_at",
     *     format="datetime",
     *     default="2023-02-14T11:26:48.000000Z"
     * )
     *
     * @var datetime
     */

    private $updated_at;

    const MIXENTITY = 'MIX';
    const TESTORDERENTITY = 'TESTORDER';

    protected $fillable = [
        'product_id',
        'unit',
        'comment',
        'dose',
        'quantity',
        'entity',
        'code_basf'
    ];

    protected $table = 'products_lists';

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'ProductsList';
}
