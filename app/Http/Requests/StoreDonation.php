<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonation extends FormRequest
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
            'name' => "required",
            'age' => "required|integer",
            'blood_type_id' => "required|exists:blood_types,id",
            'num_bags' => "required|integer",
            'hospital' => "required",
            'address_hospital' => "required",
            'city_id' => "required|exists:cities,id",
            'phone' => "required|regex:/01[0-2,5]{1}[0-9]{8}$/",
            'latitude' => "required",
            'longitude' => "required",
        ];
    }
}
