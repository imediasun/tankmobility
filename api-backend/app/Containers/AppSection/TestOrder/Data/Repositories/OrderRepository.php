<?php

namespace App\Containers\AppSection\TestOrder\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class OrderRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
