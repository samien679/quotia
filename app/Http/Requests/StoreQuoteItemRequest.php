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
            'product_number' => 'nullable|max:30',
            'name1' => 'nullable|max:35',
            'name2' => 'nullable|max:35',
            'qty' => 'numeric|max:20',
            'unit' => 'string|max:3',
            'quote_price' => 'numeric|max:99',
            'vat' => 'numeric|max:25',
            'note' => 'string|max:50'
        ];
    }
}
