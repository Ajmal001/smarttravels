<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourExinRequest extends FormRequest
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
            'exin_name' => 'required|unique:travel_tour_exclude_include|max:255'
        ];
    }
}
