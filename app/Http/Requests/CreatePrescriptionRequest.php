<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePrescriptionRequest extends FormRequest
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
            'phone'       => 'required',
            'email'       => 'string|nullable',
            'fullname'    => 'required|string',
            'address'     => 'required|string',
            'district_id' => 'required|numeric',
            'images'      => 'required',
            'images.*'    => 'image',
        ];
    }
}
