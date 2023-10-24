<?php

namespace App\Containers\AppSection\ProductMix\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ProductMixRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'product_list_id' => '=',
        'created_at' => 'like',
    ];
}
