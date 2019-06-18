<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMedicineRequest extends FormRequest
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
            'name'              => 'required',
            'medicine_group_id' => 'required|numeric|exists:medicine_groups,id',
            'supplier_id'       => 'required|numeric|exists:suppliers,id',
            'description'       => 'required',
            'unit'              => 'required',
            'quantity'          => 'numeric|nullable',
            'price'             => 'required|numeric',
            'exp'               => 'required|date_format:"d/m/Y"|after_or_equal:' . date('d/m/Y', (strtotime('+1 years'))),
            'ingredients'       => 'required',
            'objects_used'      => 'required',
            'dosage_and_usage'  => 'required',
            'preservation'      => 'required',
            'careful'           => 'required',
            'images'            => 'required',
            'images.*'          => 'image|dimensions:width=624,height=800',
        ];
    }

    public function messages()
    {
        return [
            'name.required'              => 'Vui lòng nhập tên thuốc',
            'medicine_group_id.required' => 'Vui lòng chọn nhóm thuốc',
            'supplier_id.required'       => 'Vui lòng chọn nhà cung cấp',
            'description.required'       => 'Vui lòng nhập mô tả',
            'unit.required'              => 'Vui lòng nhập đơn vị',
            'quantity.numeric'           => 'Số lượng phải là một số',
            'price.required'             => 'Vui lòng nhập giá',
            'price.numeric'              => 'Giá phải là một số',
            'exp.required'               => 'Vui lòng nhập hạn sử dụng',
            'exp.date'                   => 'Hạn sử dụng phải là ngày',
            'exp.after_or_equal'         => 'Hạn sử dụng phải trên 1 năm',
            'ingredients.required'       => 'Vui lòng nhập thành phần',
            'objects_used.required'      => 'Vui lòng nhập đối tượng sử dụng',
            'dosage_and_usage.required'  => 'Vui lòng nhập cách dùng và liều dụng',
            'preservation.required'      => 'Vui lòng nhập bảo quản',
            'careful.required'           => 'Vui lòng nhập thận trọng',
            'images.required'            => 'Vui lòng chọn hình ảnh',
            'images.*.image'             => 'Định dạng hình ảnh không hợp lệ',
            'images.*.dimensions'        => 'Hình ảnh phải có độ phân giải là 624x800',
        ];
    }
}
