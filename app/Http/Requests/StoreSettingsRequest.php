<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingsRequest extends FormRequest
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
            'company_name' => 'required|string|max:30',
            'phone_number' => 'nullable|string|max:14',
            'street_address' => 'nullable|string|max:30',
            'postal_code' => 'nullable|string|max:5',
            'city' => 'nullable|string|max:25',
            'terms_of_delivery' => 'required|string|max:50',
            'valid_days' => 'required|numeric|max:365'
        ];
    }
}
