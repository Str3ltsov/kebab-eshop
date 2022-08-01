<?php

namespace App\Services;

use App\Models\Attribute;
use Illuminate\Database\Eloquent\Collection;

interface IAttributeService
{
    public function getAttributes(): Collection|array;
    public function createAttribute(object $request): void;
    public function getAttributeById(int $id): Attribute;
    public function updateAttribute(object $attribute, object $request): void;
    public function deleteAttribute(object $attribute): void;
}
