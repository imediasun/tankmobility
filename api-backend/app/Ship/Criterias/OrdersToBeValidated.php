<?php

namespace App\Ship\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Carbon\Carbon;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;
use App\Containers\AppSection\TestOrder\Models\Test;



class OrdersToBeValidated extends Criteria
{
    protected $toBeValidated = false;

    public function __construct($toBeValidated = false){
        $this->toBeValidated  = $toBeValidated ;
    }

    public function apply($model, PrettusRepositoryInterface $repository )
    {
        if(!$this->toBeValidated){ return $model; }

        return $model->where('validator', null);
    }
}
