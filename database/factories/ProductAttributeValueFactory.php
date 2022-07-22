<?php

namespace Database\Factories;

use App\Models\ProductAttributeValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductAttributeValueFactory extends Factory
{
    protected $model = ProductAttributeValue::class;

    public function definition()
    {
        return [
            'product_id' => $this->faker->randomDigitNotNull,
            'attribute_value_id' => $this->faker->randomDigitNotNull,
            'extra_price' => $this->faker->randomFloat(0, 0, 10),
            'available' => $this->faker->boolean(100),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
