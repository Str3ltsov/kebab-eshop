<?php

namespace App\Services;

use App\Models\AttributeValue;
use Illuminate\Database\Eloquent\Collection;
use Error;


class AttributeValueService implements IAttributeValueService
{
    public function getAttributeValues(): Collection|array
    {
        $attributeValues = AttributeValue::all();

        if (empty($attributeValues))
            throw new Error(__('messages.errorGetAttributeValues'));

        return $attributeValues;
    }

    public function createAttributeValue(object $request): void
    {
        $attributeValue = AttributeValue::firstOrCreate($request->validated());

        if (!$attributeValue->wasRecentlyCreated)
            throw new Error(__('messages.errorCreateAttributeValue'));
    }

    public function getAttributeValueById(int $id): AttributeValue
    {
        $attribute = AttributeValue::find($id);

        if (empty($attribute))
            throw new Error(__('messages.errorGetAttributeById'));

        return $attribute;
    }

    public function updateAttributeValue(object $attributeValue, object $request): void
    {
        $attributeValue->attribute_id = $request->validated()['attribute_id'];
        $attributeValue->value_name = $request->validated()['value_name'];
        $attributeValue->save();
    }

    public function deleteAttributeValue(object $attributeValue): void
    {
        $attributeValue->delete();
    }
}
