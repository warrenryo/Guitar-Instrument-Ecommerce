<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccessoryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'gearCategory_id' => [
                'required',
                'integer'
            ],
            'accessory_name' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string'
            ],
            'brand' => [
                'required',
                'string'
            ],
            'small_description' => [
                'nullable',
                'string'
            ],
            'description' => [
                'nullable',
                'string'
            ],
            'orig_price' => [
                'required',
                'string'
            ],
            'sale_price' => [
                'required',
                'string'
            ],
            'quantity' => [
                'required',
                'integer'
            ],
            'trending' => [
                'nullable'
            ],
            'status' => [
                'nullable'
            ],
            'meta_title' => [
                'required',
                'string'
            ],
            'meta_keyword' => [
                'required',
                'string'
            ],
            'meta_description' => [
                'nullable',
                'string'
            ],
            'image' => [
                'nullable',
            ]
        ];
    }
}
