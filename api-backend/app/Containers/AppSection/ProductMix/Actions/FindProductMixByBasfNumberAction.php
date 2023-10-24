<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use App\Containers\AppSection\ProductMix\Models\ProductMix;
use App\Containers\AppSection\ProductMix\Tasks\FindProductMixByBasfNumberTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindProductMixByBasfNumberAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(string $basf_number): ProductMix
    {
        return app(FindProductMixByBasfNumberTask::class)->run($basf_number);
    }
}
