<?php

namespace App\Containers\AppSection\ProductMix\DTO;

/**
 * @OA\Schema(
 *     title="CreateMixDTO",
 *     description="ProductMix data transfer object",
 * )
 */
class CreateMixDTO
{
    /**
     * @OA\Property(
     *   property="productsListData",
     *   type="array",
     *    @OA\Items(ref="#/components/schemas/ProductsList"),
    ),
     * *
     * @var array
     */
    public mixed $productsListData;

    /**
     * @OA\Property(
     *     title="confidential_mix",
     *     description="confidentialMix",
     *     format="array",
     *     example="true"
     * )
     *
     * @var bool
     */
    public mixed $confidential_mix;
    public mixed $mixData;

    /**
    @OA\Property(
    property="physicalAspectsData",
    type="array",
    @OA\Items(ref="#/components/schemas/MixPhysicalAspects"),
    ),
     * *
     * @var array
     */
    public mixed $physicalAspectsData;

    /**
    @OA\Property(
    property="globalConclusionData",
    type="array",
    @OA\Items(ref="#/components/schemas/MixGlobalConclusion"),
    ),
     * *
     * @var array
     */
    public mixed $globalConclusionData;

    /**
    @OA\Property(
    property="biologicConclusionData",
    type="array",
    @OA\Items(ref="#/components/schemas/BiologicCompatible"),
    ),
     * *
     * @var array
     */

    public mixed $biologicConclusionData;
    public mixed $countriesData;

    public static function transform(mixed $args):CreateMixDTO
    {
        $dto = new self();
        $dto->productsListIds = [];
        $dto->productsListData = ['products_list'=>$args['products_list']];
        $dto->mixData = ['confidential_mix'=>$args['confidential_mix'],'exceptionaly' => $args['exceptionaly']];
        $dto->physicalAspectsData = [
            'product_mix_id' => null,
            'volume' => $args['volume'],
            'ph_rate' => $args['ph_rate'],
            'water_quality' => $args['water_quality'],
            'comment' => $args['physical_aspects_comment'],
            'conclusion' => $args['conclusion'],
            'agitation' => $args['agitation'],
            'introduction' => $args['introduction']
        ];
        $dto->globalConclusionData = [
            'product_mix_id' => null,
            'global_conclusion' => $args['global_conclusion'],
            'comment' => $args['global_conclusion_comment']
        ];
        $dto->biologicConclusionData = ['biologic_conclusion' => $args['biologic_conclusion'],'product_mix_id' => null,
            'comment' => $args['biologic_conclusion_comment']];
        $dto->countriesData = ['product_mix_id' => null, 'countries' => $args['countries']];

        return $dto;
    }
}
