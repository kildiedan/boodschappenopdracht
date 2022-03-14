<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroceryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => ["required", "min:2"],
            "price" => ["required", "numeric", "gt:0"],
            "number" => ["required", "integer", "gt:0"],
            "category" => ["required", "integer", "gt:0"]
        ];
    }
}
