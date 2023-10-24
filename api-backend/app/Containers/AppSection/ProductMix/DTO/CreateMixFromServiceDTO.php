<?php

namespace App\Containers\AppSection\ProductMix\DTO;

use Apiato\Core\Traits\HasResourceKeyTrait;

class CreateMixFromServiceDTO
{
    use HasResourceKeyTrait;

    public $productsListData;
    public $productsListIds;
    public $mixData;
    public $physicalAspectsData;
    public $globalConclusionData;
    public $biologicConclusionData;

    public static function transform(mixed $args):CreateMixFromServiceDTO
    {
        $dto = new self();
        $dto->productsListIds = $args['productsListIds'];
        $dto->productsListData = $args['productMix']->products_list_ids;
        $dto->mixData = $args['productMix'];
        $dto->physicalAspectsData = $args['mixPhysicalAspects'];
        $dto->globalConclusionData = $args['mixGlobalConclusion'];
        $dto->biologicConclusionData = $args['biologicCompatible'];;

        return $dto;
    }
}
