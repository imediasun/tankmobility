<?php

namespace App\Containers\AppSection\ProductMix\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class MixCountriesRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'mix_id' => '=',
        'created_at' => 'like',
    ];
}
