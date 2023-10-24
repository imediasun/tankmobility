<?php

namespace App\Containers\AppSection\ProductMix\UI\API\Transformers;

use App\Containers\AppSection\Product\Models\ProductsList;
use App\Containers\AppSection\ProductMix\DTO\CreateMixFromServiceDTO;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use JetBrains\PhpStorm\NoReturn;

class ProductMixTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    #[NoReturn] public function transform(CreateMixFromServiceDTO $productMix): array
    {
        $productsListData = ProductsList::whereIn('id',$productMix->productsListIds)->get();

        $response = [
            'object' => $productMix->mixData->getResourceKey(),
            'id' => $productMix->mixData->getHashedKey(),
            'confidential_mix' => $productMix->mixData->confidential_mix,
            'exceptionaly' => $productMix->mixData->exceptionaly,
            'products_list' => $productsListData,
            'physical_aspects_data' => [
                'object' => $productMix->physicalAspectsData->getResourceKey(),
                'id' => $productMix->physicalAspectsData->getHashedKey(),
                'volume' => $productMix->physicalAspectsData->volume,
                'ph_rate' => $productMix->physicalAspectsData->ph_rate,
                'water_quality' => $productMix->physicalAspectsData->water_quality,
                'comment' => $productMix->physicalAspectsData->comment,
                'conclusion' => $productMix->physicalAspectsData->conclusion,
                'agitation' => $productMix->physicalAspectsData->agitation,
                'introduction' => $productMix->physicalAspectsData->introduction,
                'product_mix_id' => $productMix->physicalAspectsData->product_mix_id,
                'updated_at' => $productMix->physicalAspectsData->updated_at,
                'created_at' => $productMix->physicalAspectsData->created_at,
                'readable_created_at' => $productMix->physicalAspectsData->created_at->diffForHumans(),
                'readable_updated_at' => $productMix->physicalAspectsData->updated_at->diffForHumans(),
            ],
            'global_conclusion_data' => [
                'object' => $productMix->globalConclusionData->getResourceKey(),
                'id' => $productMix->globalConclusionData->getHashedKey(),
                'global_conclusion' => $productMix->globalConclusionData->global_conclusion,
                'comment' => $productMix->globalConclusionData->comment,
                'product_mix_id' => $productMix->globalConclusionData->product_mix_id,
                'updated_at' => $productMix->globalConclusionData->updated_at,
                'created_at' => $productMix->globalConclusionData->created_at,
                'readable_created_at' => $productMix->globalConclusionData->created_at->diffForHumans(),
                'readable_updated_at' => $productMix->globalConclusionData->updated_at->diffForHumans(),

            ],
            'biologic_conclusion_data' => [
                'object' => $productMix->biologicConclusionData->getResourceKey(),
                'id' => $productMix->biologicConclusionData->getHashedKey(),
                'biologic_conclusion' => $productMix->biologicConclusionData->biologic_conclusion,
                'comment' => $productMix->biologicConclusionData->comment,
                'updated_at' => $productMix->biologicConclusionData->updated_at,
                'created_at' => $productMix->biologicConclusionData->created_at,
                'readable_created_at' => $productMix->biologicConclusionData->created_at->diffForHumans(),
                'readable_updated_at' => $productMix->biologicConclusionData->updated_at->diffForHumans(),


            ]




        ];

        return  $response;
    }
}
