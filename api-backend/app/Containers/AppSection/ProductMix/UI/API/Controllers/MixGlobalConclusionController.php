<?php

namespace App\Containers\AppSection\ProductMix\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ProductMix\Actions\CreateMixGlobalConclusionAction;
use App\Containers\AppSection\ProductMix\Actions\DeleteMixGlobalConclusionAction;
use App\Containers\AppSection\ProductMix\Actions\FindMixGlobalConclusionByIdAction;
use App\Containers\AppSection\ProductMix\Actions\GetAllMixGlobalConclusionAction;
use App\Containers\AppSection\ProductMix\Actions\UpdateMixGlobalConclusionAction;
use App\Containers\AppSection\ProductMix\UI\API\Requests\CreateMixGlobalConclusionRequest;
use App\Containers\AppSection\ProductMix\UI\API\Requests\DeleteMixGlobalConclusionRequest;
use App\Containers\AppSection\ProductMix\UI\API\Requests\FindMixGlobalConclusionByIdRequest;
use App\Containers\AppSection\ProductMix\UI\API\Requests\GetAllMixGlobalConclusionRequest;
use App\Containers\AppSection\ProductMix\UI\API\Requests\UpdateMixGlobalConclusionRequest;
use App\Containers\AppSection\ProductMix\UI\API\Transformers\MixGlobalConclusionTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class MixGlobalConclusionController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllMixGlobalConclusion(GetAllMixGlobalConclusionRequest $request): array
    {
        $mixglobalconclusion = app(GetAllMixGlobalConclusionAction::class)->run($request);

        return $this->transform($mixglobalconclusion, MixGlobalConclusionTransformer::class);
    }

    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findMixGlobalConclusionById(FindMixGlobalConclusionByIdRequest $request): array
    {
        $mixglobalconclusion = app(FindMixGlobalConclusionByIdAction::class)->run($request);

        return $this->transform($mixglobalconclusion, MixGlobalConclusionTransformer::class);
    }

    /**
     * @param CreateMixGlobalConclusionRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createMixGlobalConclusion(CreateMixGlobalConclusionRequest $request): JsonResponse
    {
        $mixglobalconclusion = app(CreateMixGlobalConclusionAction::class)->run($request);

        return $this->created($this->transform($mixglobalconclusion, MixGlobalConclusionTransformer::class));
    }

    /**
     * @param UpdateMixGlobalConclusionRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateMixGlobalConclusion(UpdateMixGlobalConclusionRequest $request): array
    {
        $mixglobalconclusion = app(UpdateMixGlobalConclusionAction::class)->run($request);

        return $this->transform($mixglobalconclusion, MixGlobalConclusionTransformer::class);
    }

    /**
     * @param DeleteMixGlobalConclusionRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteMixGlobalConclusion(DeleteMixGlobalConclusionRequest $request): JsonResponse
    {
        app(DeleteMixGlobalConclusionAction::class)->run($request);

        return $this->noContent();
    }
}
