<?php

namespace App\Containers\AppSection\User\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\User\Actions\GetAllUsersAction;
use App\Containers\AppSection\User\UI\API\Requests\GetAllUsersRequest;
use App\Containers\AppSection\User\UI\API\Requests\GetAutocompleteUserRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;
use App\Containers\AppSection\User\Models\User;

class GetAllUsersController extends ApiController
{
    /**
     * @param GetAllUsersRequest $request
     * @return array
     * @throws CoreInternalErrorException
     * @throws InvalidTransformerException
     * @throws RepositoryException
     */
    public function getAllUsers(GetAllUsersRequest $request): array
    {
        $users = app(GetAllUsersAction::class)->run();

        return $this->transform($users, UserTransformer::class);
    }

    public function getUserAutocomplete(GetAutocompleteUserRequest $request): JsonResponse
    {
        if(!$request->match){
            $data = User::with('roles')->get();
        }
        else{
            $data = User::where("name","LIKE","%{$request->match}%")
                ->get();
        }

        $final = [];
        foreach($data as $user){
            $final[] = $this->transform($user, UserTransformer::class);
        }

        return $this->created($final);
    }

}
