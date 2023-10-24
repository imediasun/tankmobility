<?php

namespace App\Containers\AppSection\ProductMix\Models;

use App\Ship\Parents\Models\Model as ParentModel;

/**
 * @OA\Schema(
 *     title="MixPhysicalAspects",
 *     description="MixPhysicalAspects model",
 * )
 */

class MixPhysicalAspects extends ParentModel
{
    /**
     * @OA\Property(
     *     title="object",
     *     format="string",
     *     default="MixPhysicalAspects"
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
     *     title="volume",
     *     format="float",
     *     default="0.5"
     * )
     *
     * @var float
     */

    private $volume;

    /**
     * @OA\Property(
     *     title="ph_rate",
     *     format="float",
     *     default="0.5"
     * )
     *
     * @var float
     */

    private $ph_rate;

    /**
     * @OA\Property(
     *     title="water_quality",
     *     format="float",
     *     default="0.8"
     * )
     *
     * @var float
     */

    private $water_quality;

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
     *     title="conclusion",
     *     format="string",
     *     default="conclusion"
     * )
     *
     * @var string
     */

    private $conclusion;

    /**
     * @OA\Property(
     *     title="agitation",
     *     format="bool",
     *     default="true"
     * )
     *
     * @var bool
     */

    private $agitation;

    /**
     * @OA\Property(
     *     title="intruduction",
     *     format="bool",
     *     default="true"
     * )
     *
     * @var bool
     */

    private $intraduction;

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
        'volume',
        'ph_rate',
        'water_quality',
        'conclusion',
        'comment',
        'agitation',
        'introduction',
    ];

    protected $casts = [
        'agitation' => 'boolean',
        'introduction' => 'boolean',
    ];
    protected $table = 'mix_physical_aspects';

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'MixPhysicalAspects';
}
