<?php

namespace App\Containers\AppSection\User\UI\API\Transformers;

use App\Containers\AppSection\Authorization\UI\API\Transformers\PermissionTransformer;
use App\Containers\AppSection\Authorization\UI\API\Transformers\RoleTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use League\Fractal\Resource\Collection;

class MenuTransformer extends ParentTransformer
{
    protected array $availableIncludes = [
        'roles',
        'permissions',
    ];

    protected array $defaultIncludes = [

    ];

    public function transform(array $data): array
    {
        $user = $data['user'];


/*        return $this->ifAdmin([
            'real_id' => $user->id,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'readable_created_at' => $user->created_at->diffForHumans(),
            'readable_updated_at' => $user->updated_at->diffForHumans(),
        ], $response);*/

        return $response;
    }
}
