<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
            'status_code' => 'char | required',
            'customer_id' => 'char | required',
            'vehicle_code' => 'char | required',
            'start_date' => 'date | required',
            'end_date' => 'date | required',
            'confirmation_status' => 'char | required',
            'payment_status' => 'char | required',

        ];
    }
}
