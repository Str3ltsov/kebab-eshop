<?php

namespace App\Services;

use App\Models\AttributeValue;
use Illuminate\Database\Eloquent\Collection;

interface IAttributeValueService
{
    public function getAttributeValues(): Collection|array;
    public function createAttributeValue(object $request): void;
    public function getAttributeValueById(int $id): AttributeValue;
    public function updateAttributeValue(object $attributeValue, object $request): void;
    public function deleteAttributeValue(object $attributeValue): void;
}
