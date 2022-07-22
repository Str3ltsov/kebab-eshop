<?php

namespace Database\Factories;

use App\Models\ProductAttribute;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductAttributeFactory extends Factory
{
    protected $model = ProductAttribute::class;

    public function definition()
    {
        return [
            'product_id' => $this->faker->randomDigitNotNull,
            'attribute_id' => $this->faker->randomDigitNotNull,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
