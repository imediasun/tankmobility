<?php

namespace App\Containers\AppSection\ProductMix\UI\API\Transformers;

use App\Containers\AppSection\ProductMix\Models\BiologicCompatible;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class BiologicCompatibleTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(BiologicCompatible $biologiccompatible): array
    {
        $response = [
            'object' => $biologiccompatible->getResourceKey(),
            'id' => $biologiccompatible->getHashedKey(),
            'mix_id' => $biologiccompatible->mix_id,
            'biologic_conclusion' => $biologiccompatible->biologic_conclusion,
            'comment' => $biologiccompatible->comment,
        ];

        return $this->ifAdmin([
            'real_id' => $biologiccompatible->id,
            'created_at' => $biologiccompatible->created_at,
            'updated_at' => $biologiccompatible->updated_at,
            'readable_created_at' => $biologiccompatible->created_at->diffForHumans(),
            'readable_updated_at' => $biologiccompatible->updated_at->diffForHumans(),
            // 'deleted_at' => $biologiccompatible->deleted_at,
        ], $response);
    }
}
