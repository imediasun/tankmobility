<?php

namespace App\Containers\AppSection\TestOrder\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class TestsProductsListRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
