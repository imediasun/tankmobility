<?php

namespace App\Containers\AppSection\TestOrder\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\TestOrder\Actions\CreateTestOrderAction;
use App\Containers\AppSection\TestOrder\Actions\FindTestOrderByIdAction;
use App\Containers\AppSection\TestOrder\Data\Repositories\TestOrderRepository;
use App\Containers\AppSection\TestOrder\Events\TestOrdersListedEvent;
use App\Containers\AppSection\TestOrder\Models\Order;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;
use App\Containers\AppSection\TestOrder\Actions\FindTestByIdAction;
use App\Containers\AppSection\TestOrder\Models\TestOrder;
use App\Ship\Criterias\OrdersToBeValidated;
use App\Containers\AppSection\TestOrder\Models\Test;
use App\Containers\AppSection\Product\Models\ProductsList;

class GetAllTestOrdersTask extends ParentTask
{
    public function __construct(
        protected TestOrderRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(array $data)
    {
        $ordersToBePerformed = $data['filters']['orders-to-be-performed'] ?? false;
        $tests = Test::with('testRequester', 'productsLists')
            ->when($ordersToBePerformed, function ($query) {
                return $query->whereNotNull('performed');
            })
            ->get();
            $tests->map(function ($test) {
                $test->requester = $test->testRequester->requester;
                $test->order_id = $test->testRequester->id;
                $test->order_date = $test->testRequester->created_at;

                unset($test->testRequester);

                $test->productsList = $test->productsLists->map(function ($productsList) {
                    return $productsList->toArray();
                })->toArray();
                unset($test->productsLists);

                return $test;
            })
            ->toArray();

        return $tests;

    }
}
