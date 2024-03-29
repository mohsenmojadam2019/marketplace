<?php

namespace marketplace\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:0',
            'user_id' => 'required|exists:users,id',
            'delivery_type' => 'nullable|integer|in:0,1',
            'total_price' => 'nullable|numeric|min:0',
        ];
    }
}
