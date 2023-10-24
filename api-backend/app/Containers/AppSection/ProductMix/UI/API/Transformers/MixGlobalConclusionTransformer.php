<?php

namespace App\Containers\AppSection\ProductMix\UI\API\Transformers;

use App\Containers\AppSection\ProductMix\Models\MixGlobalConclusion;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class MixGlobalConclusionTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(MixGlobalConclusion $mixglobalconclusion): array
    {
        $response = [
            'object' => $mixglobalconclusion->getResourceKey(),
            'id' => $mixglobalconclusion->getHashedKey(),
            'mix_id' => $mixglobalconclusion->mix_id,
            'global_conclusion' => $mixglobalconclusion->global_conclusion,
            'comment' => $mixglobalconclusion->comment,
        ];

        return $this->ifAdmin([
            'real_id' => $mixglobalconclusion->id,
            'created_at' => $mixglobalconclusion->created_at,
            'updated_at' => $mixglobalconclusion->updated_at,
            'readable_created_at' => $mixglobalconclusion->created_at->diffForHumans(),
            'readable_updated_at' => $mixglobalconclusion->updated_at->diffForHumans(),
            // 'deleted_at' => $mixglobalconclusion->deleted_at,
        ], $response);
    }
}
