<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductAttributeValue extends Model
{
    use HasFactory;

    public $table = 'product_attribute_values';

    public $fillable = [
        'product_id',
        'attribute_value_id',
        'extra_price',
        'available',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'product_id' => 'integer',
        'attribute_value_id' => 'integer',
        'extra_price' => 'double',
        'available' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static array $rules = [
        'product_id' => 'required|integer',
        'attribute_value_id' => 'required|integer',
        'extra_price' => 'required|nullable',
        'available' => 'required|boolean',
        'created_at' => 'nullable|date_format:Y-m-d H:i:s',
        'updated_at' => 'nullable|date_format:Y-m-d H:i:s'
    ];

    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function attributeValue(): HasOne
    {
        return $this->hasOne(AttributeValue::class, 'id', 'attribute_value_id');
    }
}
