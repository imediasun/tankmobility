<?php

namespace App\Containers\AppSection\TestOrder\Services;


use App\Containers\AppSection\Product\Actions\CreateProductsListAction;
use App\Containers\AppSection\TestOrder\Actions\CreateTestOrderAction;
use App\Containers\AppSection\TestOrder\Actions\CreateTestAction;
use App\Containers\AppSection\Product\Models\ProductsList;
use ClassTransformer\ClassTransformer;
use App\Containers\AppSection\TestOrder\Actions\CreateOrderAction;
use Illuminate\Support\Facades\DB;
use App\Containers\AppSection\TestOrder\DTO\CreateTestOrderFromServiceDTO;

class TestOrderService
{

    public function create(array $data) :CreateTestOrderFromServiceDTO
    {
        $result = DB::transaction(function () use ($data) {
            foreach($data as $key=>$obj){
                $listData['productsListIds'] = [];
                $i = 0;
                while($i < count($obj->productsListData['products_list']))
                {
                    $obj->productsListData['products_list'][$i]['entity'] = ProductsList::TESTORDERENTITY;
                    $productsLists = app(CreateProductsListAction::class)->run($obj->productsListData['products_list'][$i]);
                    $listData['productsListIds'][] = $productsLists->id;

                    $i ++;
                }
                    $result['test'][$key] =  $test = app(CreateTestAction::class)->run($obj->testData,$listData['productsListIds']);
                    $result['productsListIds'] = $listData['productsListIds'];
                    $idTests[] = $test->id;
            }

            $result['order'] = app(CreateOrderAction::class)->run($obj->ordertData);
            $result['testOrder'] = app(CreateTestOrderAction::class)->run($idTests,$result['order']->id);

            return $result;
        });

        return ClassTransformer::transform(CreateTestOrderFromServiceDTO::class, $result);
    }

}
