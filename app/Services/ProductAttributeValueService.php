<?php

namespace App\Services;

use App\Models\Attribute;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use Illuminate\Database\Eloquent\Collection;
use Error;


class ProductAttributeValueService implements IProductAttributeValueService
{
    public function getProductById(int $id): Product
    {
        $product = Product::find($id);

        if (empty($product))
            throw new Error(__('messages.errorGetProductById'));

        return $product;
    }

    public function getProductAttributes(int $id): array|Collection
    {
        $productAttributes = ProductAttribute::all()->where('product_id', $id);

        if (empty($productAttributes))
            throw new Error(__('messages.errorGetProductAttributes'));

        return $productAttributes;
    }

    public function getProductAttributeValues(int $id): Collection|array
    {
        $productAttributeValues = ProductAttributeValue::all()->where('product_id', $id);

        if (empty($productAttributeValues))
            throw new Error(__('messages.errorGetProductAttributeValues'));

        return $productAttributeValues;
    }

    public function getAttributeValuesByProduct(int $id): array
    {
        $attributeValues = Attribute::select('attribute_values.value_name', 'attribute_values.id')
            ->join('attribute_values', 'attributes.id', 'attribute_values.attribute_id')
            ->join('product_attributes', 'attributes.id', 'product_attributes.attribute_id')
            ->where('product_attributes.product_id', $id)
            ->pluck('attribute_values.value_name', 'attribute_values.id')
            ->toArray();

        if (empty($attributeValues))
            throw new Error(__('messages.errorGetAttributeValues'));

        return $attributeValues;
    }

    private function getProductAttributeValueByProduct(int $id): array
    {
        return ProductAttributeValue::select('attribute_values.value_name')
            ->join('attribute_values', 'product_attribute_values.attribute_value_id', 'attribute_values.id')
            ->where('product_attribute_values.product_id', $id)
            ->pluck('attribute_values.value_name')
            ->toArray();
    }

    public function removeExistingProductAttributeValues(int $id, array $attributeValues): array
    {
        $productAttributeValues = $this->getProductAttributeValueByProduct($id);

        foreach ($attributeValues as $attributeValueKey => $attributeValueName) {
            foreach ($productAttributeValues as $productAttributeValueKey => $productAttributeValueName) {
                if ($attributeValueName == $productAttributeValueName)
                    unset($attributeValues[$attributeValueKey]);
            }
        }

        return $attributeValues;
    }

    public function createProductAttributeValue(object $request, object $product): void
    {
        $productAttributeValue = ProductAttributeValue::firstOrCreate($request->validated());

        if (!$productAttributeValue->wasRecentlyCreated)
            throw new Error(__('messages.errorCreateProductAttributeValue'));
    }

    public function getProductAttributeValueById(int $attributeValueId): Collection|ProductAttributeValue
    {
        $productAttributeValue = ProductAttributeValue::where('id', $attributeValueId)->first();

        if (empty($productAttributeValue))
            throw new Error(__('messages.errorGetProductAttributeValueById'));

        return $productAttributeValue;
    }

    public function updateProductAttributeValue(object $productAttributeValue, object $request): void
    {
        $productAttributeValue->extra_price = $request->validated()['extra_price'];
        $productAttributeValue->available = $request->validated()['available'];
        $productAttributeValue->save();
    }

    public function deleteProductAttributeValue(object $productAttributeValue): void
    {
        $productAttributeValue->delete();
    }
}
