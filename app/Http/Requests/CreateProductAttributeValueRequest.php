<?php

namespace App\Http\Requests;

use App\Models\ProductAttributeValue;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductAttributeValueRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return ProductAttributeValue::$rules;
    }
}
