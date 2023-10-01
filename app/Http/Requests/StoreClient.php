<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClient extends FormRequest
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
            'email' => "required|unique:clients,email,$this->id",
            'name' => "required|min:3",
            'phone' => "required|regex:/01[0-2,5]{1}[0-9]{8}$/|unique:clients,phone,$this->id",
            'password' => "required|confirmed|min:5",
            'date_birth' => "required",
            'blood_type_id' => "required|exists:blood_types,id",
            'last_date_donation' => "required",
            'city_id' => "required|exists:cities,id",
        ];
    }
}
