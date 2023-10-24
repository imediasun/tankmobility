<?php

namespace App\Containers\AppSection\ProductMix\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ProductMix\Actions\CreateMixPhysicalAspectsAction;
use App\Containers\AppSection\ProductMix\Actions\DeleteMixPhysicalAspectsAction;
use App\Containers\AppSection\ProductMix\Actions\FindMixPhysicalAspectsByIdAction;
use App\Containers\AppSection\ProductMix\Actions\GetAllMixPhysicalAspectsAction;
use App\Containers\AppSection\ProductMix\Actions\UpdateMixPhysicalAspectsAction;
use App\Containers\AppSection\ProductMix\UI\API\Requests\CreateMixPhysicalAspectsRequest;
use App\Containers\AppSection\ProductMix\UI\API\Requests\DeleteMixPhysicalAspectsRequest;
use App\Containers\AppSection\ProductMix\UI\API\Requests\FindMixPhysicalAspectsByIdRequest;
use App\Containers\AppSection\ProductMix\UI\API\Requests\GetAllMixPhysicalAspectsRequest;
use App\Containers\AppSection\ProductMix\UI\API\Requests\UpdateMixPhysicalAspectsRequest;
use App\Containers\AppSection\ProductMix\UI\API\Transformers\MixPhysicalAspectsTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class MixPhysicalAspectsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllMixPhysicalAspects(GetAllMixPhysicalAspectsRequest $request): array
    {
        $mixphysicalaspects = app(GetAllMixPhysicalAspectsAction::class)->run($request);

        return $this->transform($mixphysicalaspects, MixPhysicalAspectsTransformer::class);
    }

    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findMixPhysicalAspectsById(FindMixPhysicalAspectsByIdRequest $request): array
    {
        $mixphysicalaspects = app(FindMixPhysicalAspectsByIdAction::class)->run($request);

        return $this->transform($mixphysicalaspects, MixPhysicalAspectsTransformer::class);
    }

    /**
     * @param CreateMixPhysicalAspectsRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createMixPhysicalAspects(CreateMixPhysicalAspectsRequest $request): JsonResponse
    {
        $mixphysicalaspects = app(CreateMixPhysicalAspectsAction::class)->run($request);

        return $this->created($this->transform($mixphysicalaspects, MixPhysicalAspectsTransformer::class));
    }

    /**
     * @param UpdateMixPhysicalAspectsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateMixPhysicalAspects(UpdateMixPhysicalAspectsRequest $request): array
    {
        $mixphysicalaspects = app(UpdateMixPhysicalAspectsAction::class)->run($request);

        return $this->transform($mixphysicalaspects, MixPhysicalAspectsTransformer::class);
    }

    /**
     * @param DeleteMixPhysicalAspectsRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteMixPhysicalAspects(DeleteMixPhysicalAspectsRequest $request): JsonResponse
    {
        app(DeleteMixPhysicalAspectsAction::class)->run($request);

        return $this->noContent();
    }
}
