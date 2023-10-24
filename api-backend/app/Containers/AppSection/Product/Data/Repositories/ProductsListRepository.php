<?php

namespace App\Containers\AppSection\Product\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ProductsListRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'comment' => 'like',
        'created_at' => 'like',
    ];
}
