<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'first_name' => 'string | required',
            'last_name' => 'string | required',
            'user_name' => 'string | required',
            'phone_number' => 'string | required | regex:/^(09)\d{9}$/',
            'email' => 'string | required | email:rfc,dns',
            'company_name' => 'string|nullable',
            'gender' => 'string | nullable',
            'address' => 'string | nullable',
            'city' => 'string | required',
            'country' => 'string | required',
            'password' => 'string | required | min:8 | confirmed',
            'password_confirmation' => 'same:password',
            'user_type' => 'string | required | in:admin,user,driver',
        ];
    }
}
