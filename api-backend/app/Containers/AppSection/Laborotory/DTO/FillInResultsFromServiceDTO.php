<?php

namespace App\Containers\AppSection\Laborotory\DTO;

use Apiato\Core\Traits\HasResourceKeyTrait;

class FillInResultsFromServiceDTO
{
    use HasResourceKeyTrait;
    public $testCompatibilityDeposit;
    public $testId;
    public $testCompatibilityFilterOne;
    public $testCompatibilityFilterTwo;
    public $testCompatibilityFilterTree;
    public $testCompatibilityComments;
    public $testCompatibilityMousse;


    public static function transform(mixed $args):FillInResultsFromServiceDTO
    {
        $dto = new self();
        $dto->testCompatibilityDeposit = $args['deposit'];
        $dto->testId = $args['test_id'];
        $dto->testCompatibilityFilterOne = $args['filter300'];
        $dto->testCompatibilityFilterTwo = $args['filter150'];
        $dto->testCompatibilityFilterTree = $args['filter50'];
        $dto->testCompatibilityComments = $args['comment'];
        $dto->testCompatibilityMousse = $args['mousse'];


        return $dto;
    }
}
