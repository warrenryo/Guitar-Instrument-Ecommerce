<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StringFormRequest extends FormRequest
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
        'stringCategory' => [
            'required',
            'string'
        ],
        'string_name'=> [
            'required',
            'string'
        ],
        'slug' => [
            'required',
            'string'
        ],
        'brand' => [
            'nullable',
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
        'quantity' => [
            'required',
            'integer'
        ],
        'sale_price' => [
            'required',
            'string'
        ],
        'trending' => [
            'nullable'
        ],
        'status' => [
            'nullable'
        ],
        'meta_title' => [
            'nullable',
            'string'
        ],
        'meta_keyword' => [
            'nullable',
            'string'
        ],
        'meta_description' => [
            'nullable',
            'string'
        ]
        ];
    }
}
