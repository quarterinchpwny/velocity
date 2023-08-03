<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'vehicle_code' => 'string | required',
            'manufacturer_code' => 'string | required',
            'category_code' => 'string | required',
            'model_code' => 'string | required',
            'vehicle_name' => 'string | required',
            'vehicle_details' => 'string | nullable',
            'daily_hire_rate' => 'numeric | required',
            'monthly_hire_rate' => 'numeric | required',
            'mileage' => 'numeric | nullable',
        ];
    }
}
