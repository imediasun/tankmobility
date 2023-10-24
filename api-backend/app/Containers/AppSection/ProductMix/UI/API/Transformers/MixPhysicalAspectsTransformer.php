<?php

namespace App\Containers\AppSection\ProductMix\UI\API\Transformers;

use App\Containers\AppSection\ProductMix\Models\MixPhysicalAspects;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class MixPhysicalAspectsTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(MixPhysicalAspects $mixphysicalaspects): array
    {
        $response = [
            'object' => $mixphysicalaspects->getResourceKey(),
            'id' => $mixphysicalaspects->getHashedKey(),
            'mix_id' => $mixphysicalaspects->mix_id,
            'volume' => $mixphysicalaspects->volume,
            'ph_rate' => $mixphysicalaspects->ph_rate,
            'water_quality' => $mixphysicalaspects->water_quality,
            'conclusion' => $mixphysicalaspects->conclusion,
            'comment' => $mixphysicalaspects->comment,
            'agitation' => $mixphysicalaspects->agitation,
            'introduction' => $mixphysicalaspects->introduction,
        ];

        return $this->ifAdmin([
            'real_id' => $mixphysicalaspects->id,
            'created_at' => $mixphysicalaspects->created_at,
            'updated_at' => $mixphysicalaspects->updated_at,
            'readable_created_at' => $mixphysicalaspects->created_at->diffForHumans(),
            'readable_updated_at' => $mixphysicalaspects->updated_at->diffForHumans(),
            // 'deleted_at' => $mixphysicalaspects->deleted_at,
        ], $response);
    }
}
