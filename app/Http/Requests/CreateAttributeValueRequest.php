<?php

namespace App\Http\Requests;

use App\Models\AttributeValue;
use Illuminate\Foundation\Http\FormRequest;

class CreateAttributeValueRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return AttributeValue::$rules;
    }
}
