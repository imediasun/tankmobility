<?php

namespace App\Containers\AppSection\ProductMix\Models;

use App\Ship\Parents\Models\Model as ParentModel;

/**
 * @OA\Schema(
 *     title="BiologicCompatible",
 *     description="BiologicCompatible model",
 * )
 */

class BiologicCompatible extends ParentModel
{
    /**
     * @OA\Property(
     *     title="object",
     *     format="string",
     *     default="BiologicCompatible"
     * )
     *
     * @var string
     */
    private $object;

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
     *     title="biologic_conclusion",
     *     format="string",
     *     default="biologic_conclusion"
     * )
     *
     * @var string
     */

    private $biologic_conclusion;


    /**
     * @OA\Property(
     *     title="product_mix_id",
     *     format="integer",
     *     default="1"
     * )
     *
     * @var integer
     */

    private $product_mix_id;

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

    protected $fillable = [
        'product_mix_id',
        'biologic_conclusion',
        'comment',
    ];

    protected $table = 'biologic_compatibles';

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'BiologicCompatible';
}
