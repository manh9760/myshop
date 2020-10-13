<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
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
            'name' => 'required|min:3|unique:products,name,'.$this->id,
            'price_entry' => 'required',
            'price_old' => 'required',
            'sale' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'tech_info' => 'required',
            'content' => 'required',
        ];
    }

    public function messages() {
        return [
            // ['Tên trường input'] => ['Ràng buộc']|['Ràng buộc']:['Tên bảng'],['Tên cột trong bảng']
            'name.required' => 'Trường bắt buộc nhập',
            'name.unique' => 'Danh mục đã tồn tại',
            'name.min' => 'Tên danh mục phải ít nhất 3 ký tự',
            'description.required' => 'Vui lòng nhập mô tả ngắn',
            'tech_info.required' => 'Vui lòng nhập thông số kỹ thuật',
            'content.required' => 'Vui lòng nhập mô tả chi tiết',
        ];
    }
}
