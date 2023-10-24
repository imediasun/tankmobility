<?php

namespace App\Containers\AppSection\Laborotory\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class FilterTwoCompatibilityRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
