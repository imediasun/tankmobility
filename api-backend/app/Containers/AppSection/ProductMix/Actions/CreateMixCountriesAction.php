<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ProductMix\Models\MixCountries;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Containers\AppSection\ProductMix\Tasks\CreateMixCountriesTask;

class CreateMixCountriesAction extends ParentAction
{
    /**
     * @param array $countriesData
     * @return MixCountries
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(array $countriesData): array
    {
        $countriesMixData['product_mix_id'] = $countriesData['product_mix_id'];
        foreach($countriesData['countries'] as $country){
            $countriesMixData['country'] = $country;

            $result[] = app(CreateMixCountriesTask::class)->run($countriesMixData);
        }

        return $result;
    }
}
