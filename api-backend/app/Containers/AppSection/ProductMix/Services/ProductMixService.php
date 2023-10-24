<?php

namespace App\Containers\AppSection\ProductMix\Services;


use App\Containers\AppSection\Product\Actions\CreateProductsListAction;
use App\Containers\AppSection\Product\Models\ProductsList;
use App\Containers\AppSection\ProductMix\Actions\CreateBiologicCompatibleAction;
use App\Containers\AppSection\ProductMix\Actions\CreateMixGlobalConclusionAction;
use App\Containers\AppSection\ProductMix\Actions\CreateMixPhysicalAspectsAction;
use App\Containers\AppSection\ProductMix\Actions\CreateProductMixAction;
use ClassTransformer\ClassTransformer;
use Illuminate\Support\Facades\DB;
use App\Containers\AppSection\ProductMix\DTO\CreateMixDTO;
use App\Containers\AppSection\ProductMix\DTO\CreateMixFromServiceDTO;
use App\Containers\AppSection\ProductMix\Actions\CreateMixCountriesAction;

class ProductMixService
{

    public function create(CreateMixDTO $obj) :CreateMixFromServiceDTO
    {
        $result = DB::transaction(function () use ($obj) {
            foreach($obj->productsListData['products_list'] as $item){
                $item['entity'] = ProductsList::MIXENTITY;
                $productsLists = app(CreateProductsListAction::class)->run($item);
                $result['productsListIds'][] = $productsLists->id;
                $productsListsArray[] = $productsLists;
            }
            foreach($productsListsArray as $list){
                $obj->mixData['products_list_ids'][] = $list->id;
            }

            $result['productMix'] = app(CreateProductMixAction::class)->run($obj->mixData);
            foreach($obj as &$dataField){
                if (array_key_exists('product_mix_id', $dataField)) {
                    $dataField['product_mix_id'] = $result['productMix']->id;
                }
            }

            $result['mixPhysicalAspects'] = app(CreateMixPhysicalAspectsAction::class)->run($obj->physicalAspectsData);
            $result['mixGlobalConclusion'] = app(CreateMixGlobalConclusionAction::class)->run($obj->globalConclusionData);
            $result['biologicCompatible'] = app(CreateBiologicCompatibleAction::class)->run($obj->biologicConclusionData);
            $result['mixCountries'] = app(CreateMixCountriesAction::class)->run($obj->countriesData);

            return $result;
        });

        return ClassTransformer::transform(CreateMixFromServiceDTO::class, $result);
    }

}
