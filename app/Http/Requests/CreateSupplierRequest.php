<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSupplierRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255',
            'email' => 'email|string|nullable',
            'address' => 'string|min:3|max:255|nullable',
            'phone' => 'numeric|min:6|max:15|nullable',
            'country' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên nhà cung cấp',
            'name.min' => 'Tên nhà cung cấp phải chứa ít nhất 3 ký tự',
            'name.max' => 'Tên nhà cung cấp chỉ chứa tối đa 255 ký tự',
            'email.email' => 'Địa chỉ email không hợp lệ',
            'address.min' => 'Địa chỉ phải chứa ít nhất 3 ký tự',
            'address.max' => 'Địa chỉ chỉ chứa tối đa 255 ký tự',
            'phone.numeric' => 'Số điện thoại không được chứa ký tự',
            'phone.min' => 'Số điện thoại phải có ít nhất 6 ký số',
            'phone.max' => 'Số điện thoại chỉ tối đa 15 ký số',
            'country.required' => 'Vui lòng nhập quốc gia',
        ];
    }
}
