<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'client_name' => 'required|string|max:30',
            'client_contact_person' => 'nullable|string|max:25',
            'client_telephone' => 'string|max:25',
            'client_email' => 'required|string|max:40',
            'client_address' => 'required|string|max:40',
            'client_postal_code' => 'required|string|max:5',
            'client_city' => 'required|string|max:30',


        ];
    }
}
