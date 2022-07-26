<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductAttributeValue;
use Illuminate\Database\Eloquent\Collection;

interface IProductAttributeValueService
{
    public function getProductById(int $id): Product;
    public function getProductAttributes(int $id): array|Collection;
    public function getProductAttributeValues(int $id): Collection|array;
    public function getAttributeValuesByProduct(int $id): array;
    public function removeExistingProductAttributeValues(int $id, array $attributeValues): array;
    public function createProductAttributeValue(object $request, object $product): void;
    public function getProductAttributeValueById(int $attributeValueId): Collection|ProductAttributeValue;
    public function updateProductAttributeValue(object $productAttributeValue, object $request): void;
    public function deleteProductAttributeValue(object $productAttributeValue): void;
}
