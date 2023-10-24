<?php

namespace App\Containers\AppSection\ProductMix\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class MixGlobalConclusionRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'product_mix_id' => '=',
        'created_at' => 'like',
    ];
}
