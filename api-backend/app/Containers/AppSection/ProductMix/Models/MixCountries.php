<?php

namespace App\Containers\AppSection\ProductMix\Models;

use App\Ship\Parents\Models\Model as ParentModel;

/**
 * @OA\Schema(
 *     title="MixCountries",
 *     description="MixCountries model",
 * )
 */

class MixCountries extends ParentModel
{
    protected $fillable = [
        'product_mix_id',
        'country',
    ];


    protected $table = 'mix_countries';

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'MixCountries';
}
