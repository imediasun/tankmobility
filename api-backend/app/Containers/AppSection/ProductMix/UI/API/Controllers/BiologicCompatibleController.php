<?php

namespace App\Containers\AppSection\ProductMix\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ProductMix\Actions\CreateBiologicCompatibleAction;
use App\Containers\AppSection\ProductMix\Actions\DeleteBiologicCompatibleAction;
use App\Containers\AppSection\ProductMix\Actions\FindBiologicCompatibleByIdAction;
use App\Containers\AppSection\ProductMix\Actions\GetAllBiologicCompatibleAction;
use App\Containers\AppSection\ProductMix\Actions\UpdateBiologicCompatibleAction;
use App\Containers\AppSection\ProductMix\UI\API\Requests\CreateBiologicCompatibleRequest;
use App\Containers\AppSection\ProductMix\UI\API\Requests\DeleteBiologicCompatibleRequest;
use App\Containers\AppSection\ProductMix\UI\API\Requests\FindBiologicCompatibleByIdRequest;
use App\Containers\AppSection\ProductMix\UI\API\Requests\GetAllBiologicCompatibleRequest;
use App\Containers\AppSection\ProductMix\UI\API\Requests\UpdateBiologicCompatibleRequest;
use App\Containers\AppSection\ProductMix\UI\API\Transformers\BiologicCompatibleTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class BiologicCompatibleController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllBiologicCompatible(GetAllBiologicCompatibleRequest $request): array
    {
        $biologiccompatible = app(GetAllBiologicCompatibleAction::class)->run($request);

        return $this->transform($biologiccompatible, BiologicCompatibleTransformer::class);
    }

    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findBiologicCompatibleById(FindBiologicCompatibleByIdRequest $request): array
    {
        $biologiccompatible = app(FindBiologicCompatibleByIdAction::class)->run($request);

        return $this->transform($biologiccompatible, BiologicCompatibleTransformer::class);
    }

    /**
     * @param CreateBiologicCompatibleRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createBiologicCompatible(CreateBiologicCompatibleRequest $request): JsonResponse
    {
        $biologiccompatible = app(CreateBiologicCompatibleAction::class)->run($request);

        return $this->created($this->transform($biologiccompatible, BiologicCompatibleTransformer::class));
    }

    /**
     * @param UpdateBiologicCompatibleRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateBiologicCompatible(UpdateBiologicCompatibleRequest $request): array
    {
        $biologiccompatible = app(UpdateBiologicCompatibleAction::class)->run($request);

        return $this->transform($biologiccompatible, BiologicCompatibleTransformer::class);
    }

    /**
     * @param DeleteBiologicCompatibleRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteBiologicCompatible(DeleteBiologicCompatibleRequest $request): JsonResponse
    {
        app(DeleteBiologicCompatibleAction::class)->run($request);

        return $this->noContent();
    }
}
