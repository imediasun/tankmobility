<?php

namespace App\Containers\AppSection\User\UI\API\Controllers;


use App\Containers\AppSection\User\UI\API\Requests\GetAutocompleteUserRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Controllers\ApiController;
use App\Containers\AppSection\User\UI\API\Transformers\MenuTransformer;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Containers\AppSection\User\UI\API\Requests\GetMyUserRequest;
use Illuminate\Support\Facades\Response as ResponseFacade;
use Symfony\Component\HttpFoundation\Response;
use Laravel\Passport\Token;
use App\Containers\AppSection\User\UI\API\Requests\GetMenuRequest;

class Controller extends ApiController
{

    /**
     * @OA\Get(
     *      path="/v1/me",
     *      operationId="GetMyUserUserRequest",
     *      tags={"Users"},
     *      summary="GetMyUserUserRequest",
     *      security={{"token":{}}},
     *      description="Returns user by nickname",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *     @OA\Property(
     *              property="data",
     *              type="object",
     *             ref="#/components/schemas/User"
     * ),
     * ),
     * ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */

    public function getMyUser(GetMyUserRequest $request): JsonResponse
    {
        $user = Auth::user();

        return $this->created($this->transform($user, UserTransformer::class));
    }


    /**
     * @OA\Get(
     *      path="/v1/menu",
     *      operationId="GetMenuRequest",
     *      tags={"Users"},
     *      summary="GetMenuRequest",
     *      security={{"token":{}}},
     *      description="Returns user by nickname",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *     @OA\Property(
     *              property="user_id",
     *              type="integer",
     *             default="1"
     * ),
     *     @OA\Property(
     *              property="user_name",
     *              type="string",
     *             default="lopushanskyi andrey"
     * ),
     *       @OA\Property(
     *              property="user_email",
     *              type="string",
     *             default="basf_test@basf.com"
     * ),
     *   @OA\Property(
     * property="menu",
     * type="array",
     * @OA\Items(),
     *),
     * ),
     * ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */

    public function getMenu(GetMenuRequest $request): array
    {
        $user = Auth::user();

        $data = [
            ['section' => 'general',  'menu' => [
                ['name' => 'Dashboard','marker' => 4,'icon'=>'dashboard'],
                ['name' => 'Mixes','marker' => 4, 'icon' => 'mixes'],
                ['name' => 'Laboratory','marker' => 3, 'icon' => 'laboratory'],
                ['name' => 'Products', 'icon' => 'laboratory'],
            ]],
            ['section' => 'managment',  'menu' => [
                ['name' => 'Users','icon'=>'dashboard',
                    'menu' => [
                        ['name' => 'Users', 'icon' => 'point'],
                        ['name' => 'Roles', 'icon' => 'point'],
                    ]
                ],

            ]],
            ];
        return $response = [
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email,
            'menu' => $data
        ];
    }








}
