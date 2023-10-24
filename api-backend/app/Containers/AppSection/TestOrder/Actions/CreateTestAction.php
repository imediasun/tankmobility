<?php

namespace App\Containers\AppSection\TestOrder\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Product\Actions\CreateProductsListAction;
use App\Containers\AppSection\TestOrder\Models\Test;
use App\Containers\AppSection\TestOrder\Tasks\CreateTestTask;
use App\Containers\AppSection\TestOrder\UI\API\Requests\CreateTestOrderRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Containers\AppSection\TestOrder\Tasks\CreateTestsProductsListsTask;

class CreateTestAction extends ParentAction
{

    public function run(array $test, $listData): Test
    {
        $test = app(CreateTestTask::class)->run($test);
        $data['test_id'] = $test->id;
        foreach($listData as $products_list){
            $data['products_list_id'] = $products_list;
            app(CreateTestsProductsListsTask::class)->run($data);
        }

        return $test;
    }
}
