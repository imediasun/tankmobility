<?php

namespace App\Containers\AppSection\ProductMix\Tasks;

use App\Containers\AppSection\ProductMix\Data\Repositories\MixCountriesRepository;
use App\Containers\AppSection\ProductMix\Models\MixCountries;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateMixCountriesTask extends ParentTask
{
    public function __construct(
        protected MixCountriesRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): MixCountries
    {
        try {
            return $this->repository->create($data);
        } catch (Exception $exception) {
            dd($exception->getMessage());
            throw new CreateResourceFailedException();
        }
    }
}
