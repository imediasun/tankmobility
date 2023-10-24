<?php

namespace App\Containers\AppSection\Product\Tasks;

use App\Containers\AppSection\Product\Data\Repositories\ProductRepository;
use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateProductTask extends ParentTask
{
    protected ProductRepository $repository;

    public function __construct(ProductRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Product
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException $exception) {
            throw new NotFoundException();
        } catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
