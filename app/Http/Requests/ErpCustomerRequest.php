<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErpCustomerRequest extends FormRequest
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
            //
            'customer_name' => 'required|max:255',
            'email' => 'required|email',
            'customer_phone' => 'required|min:5',
            'customer_nid' => 'required|unique:erp_customers|max:50',
            'customer_passport_no' => 'required|unique:erp_customers|max:50'
        ];
    }
}
