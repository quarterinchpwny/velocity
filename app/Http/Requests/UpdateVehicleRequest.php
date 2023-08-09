<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleRequest extends FormRequest
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
            'code' => 'string | required',
            'vehicle_code' => 'string ',
            'manufacturer_code' => 'string ',
            'category_code' => 'string ',
            'model_code' => 'string ',
            'vehicle_name' => 'string | nullable',
            'vehicle_details' => 'string| nullable ',
            'daily_hire_rate' => 'numeric| nullable ',
            'monthly_hire_rate' => 'numeric | nullable',
            'mileage' => 'numeric | nullable',
        ];
    }
}
