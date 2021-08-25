<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuoteItemRequest extends FormRequest
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
            'product_number' => 'nullable|string|max:30',
            'name1' => 'required|string|max:25',
            'name2' => 'nullable|string|max:25',
            'qty' => 'required|numeric|max:999999',
            'unit' => 'required|string|max:3',
            'purchase_price' => 'required|numeric|max:999999',
            'quote_price' => 'required|numeric|max:999999',
            'vat' => 'required|numeric|max:99',
            'supplier' => 'nullable|string|max:25',
            'note' => 'nullable|string|max:50'
        ];
    }
}
