<?php

namespace App\Containers\AppSection\TestOrder\DTO;

use Apiato\Core\Traits\HasResourceKeyTrait;

class CreateTestOrderFromServiceDTO
{
    use HasResourceKeyTrait;

    public $productsListIds;
    public $testData;
    public $testOrderData;


    public static function transform(mixed $args):CreateTestOrderFromServiceDTO
    {
        $dto = new self();
        $dto->productsListIds = (isset($args['productsListIds'])) ? $args['productsListIds'] : null;
        $dto->testData = $args['test'];
        $dto->testOrderData = $args['testOrder'];
        $dto->orderData = $args['order'];

        return $dto;
    }
}
