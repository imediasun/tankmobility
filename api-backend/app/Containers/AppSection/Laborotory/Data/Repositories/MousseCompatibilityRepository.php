<?php

namespace App\Containers\AppSection\Laborotory\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class MousseCompatibilityRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
