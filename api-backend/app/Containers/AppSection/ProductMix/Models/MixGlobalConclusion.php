<?php

namespace App\Containers\AppSection\ProductMix\Models;

use App\Ship\Parents\Models\Model as ParentModel;

/**
 * @OA\Schema(
 *     title="MixGlobalConclusion",
 *     description="MixGlobalConclusion model",
 * )
 */

class MixGlobalConclusion extends ParentModel
{

    /**
     * @OA\Property(
     *     title="object",
     *     format="string",
     *     default="MixGlobalConclusion"
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
     *     title="global_conclusion",
     *     format="string",
     *     default="global_conclusion"
     * )
     *
     * @var string
     */

    private $global_conclusion;


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
        'global_conclusion',
        'comment',
    ];
    protected $table = 'mix_global_conclusion';

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'MixGlobalConclusion';
}
