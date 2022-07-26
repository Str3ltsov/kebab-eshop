<?php

namespace App\Services;

use App\Models\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Error;


class AttributeService implements IAttributeService
{
    public function getAttributes(): Collection|array
    {
        $attributes = Attribute::all();

        if (empty($attributes))
            throw new Error(__('messages.errorGetAttributes'));

        return $attributes;
    }

    public function createAttribute(object $request): void
    {
        $attribute = Attribute::firstOrCreate(['name' => $request->validated()['name']]);

        if (!$attribute->wasRecentlyCreated)
            throw new Error(__('messages.errorCreateAttribute'));
    }

    public function getAttributeById(int $id): Attribute
    {
        $attribute = Attribute::find($id);

        if (empty($attribute))
            throw new Error(__('messages.errorGetAttributeById'));

        return $attribute;
    }

    public function updateAttribute(object $attribute, object $request): void
    {
        $attribute->name = $request->validated()['name'];
        $attribute->save();
    }

    public function deleteAttribute(object $attribute): void
    {
        $attribute->delete();
    }
}
