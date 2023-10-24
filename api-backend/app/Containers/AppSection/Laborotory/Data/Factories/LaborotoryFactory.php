<?php

namespace App\Containers\AppSection\Laborotory\Data\Factories;

use App\Containers\AppSection\Laborotory\Models\Laborotory;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class LaborotoryFactory extends ParentFactory
{
    protected $model = Laborotory::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
