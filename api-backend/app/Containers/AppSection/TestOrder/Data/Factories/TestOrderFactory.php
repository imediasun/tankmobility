<?php

namespace App\Containers\AppSection\TestOrder\Data\Factories;

use App\Containers\AppSection\TestOrder\Models\TestOrder;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class TestOrderFactory extends ParentFactory
{
    protected $model = TestOrder::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
