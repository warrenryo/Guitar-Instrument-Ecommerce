<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdersFormRequest extends FormRequest
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
            'productId' => [
                'required',
                'string'
            ],
            'productCategory' => [
                'required',
                'string'
            ],
            'productBrand' => [
                'required',
                'string'
            ],
            'productName' => [
                'required',
                'string'
            ],
            'productColor' => [
                'nullable',
                'string'
            ],
            'productTotalPrice' => [
                'required',
                'string'
            ],
            'firstName' => [
                'required',
                'string'
            ],
            'lastName' => [
                'required',
                'string'
            ],
            'company' => [
                'nullable',
                'string'
            ],
            'address' => [
                'required',
                'string'
            ],
            'apartment' => [
                'nullable',
                'string'
            ],
            'postalCode' => [
                'required',
                'string'
            ],
            'city' => [
                'required',
                'string'
            ],
            'phoneNumber' => [
                'nullable',
                'string'
            ],
            'contactInfo' => [
                'required',
                'string'
            ],
            'delivery_method' => [
                'required',
                'string'
            ],
            'payment_method' => [
                'required',
                'string'
            ],
            'status' =>[
                'required',
                'string'
            ]
        ];
    }
}
