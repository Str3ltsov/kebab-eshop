<?php

namespace Database\Factories;

use App\Models\AttributeValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttributeValueFactory extends Factory
{
    protected $model = AttributeValue::class;

    public function definition()
    {
        return [
            'value_name' => $this->faker->text(10),
            'attribute_id' => $this->faker->randomDigitNotNull,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
