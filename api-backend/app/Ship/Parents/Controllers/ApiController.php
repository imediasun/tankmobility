<?php

namespace App\Ship\Parents\Controllers;

use Apiato\Core\Abstracts\Controllers\ApiController as AbstractApiController;
use App\Ship\Parents\Requests\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

abstract class ApiController extends AbstractApiController
{
    protected function filterCreator(Request $request): array
    {
        $filters['limit'] = (!empty($request->query('limit'))) ? $request->query('limit') : 10;
        $filters['page'] = (!empty($request->query('page'))) ? $request->query('page') : 1;
        $filters['orders-to-be-performed'] = (!empty($request->query('orders-to-be-performed'))) ? $request->query('orders-to-be-performed') : 0;

        return $filters;
    }

    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
