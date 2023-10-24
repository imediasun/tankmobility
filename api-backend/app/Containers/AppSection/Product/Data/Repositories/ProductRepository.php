<?php

namespace App\Containers\AppSection\Product\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ProductRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'name' => 'like',
        'created_at' => 'like',
    ];
}
