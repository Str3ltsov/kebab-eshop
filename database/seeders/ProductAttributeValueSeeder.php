<?php

namespace Database\Seeders;

use App\Models\ProductAttributeValue;
use Illuminate\Database\Seeder;

class ProductAttributeValueSeeder extends Seeder
{
    public function run()
    {
        ProductAttributeValue::factory()->count(30)->create();
    }
}
