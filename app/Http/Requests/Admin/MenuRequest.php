<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest {
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
    public function rules() {
        return [
            // ['Tên trường input'] => ['Ràng buộc']|['Ràng buộc']:['Tên bảng'],['Tên cột trong bảng']
            'name' => 'required|min:3|unique:menus,name,'.$this->id,
        ];
    }

    public function messages() {
        return [
            // ['Tên trường input'] => ['Ràng buộc']|['Ràng buộc']:['Tên bảng'],['Tên cột trong bảng']
            'name.required' => 'Trường bắt buộc nhập',
            'name.unique' => 'Danh mục bài viết đã tồn tại',
            'name.min' => 'Phải ít nhất 3 ký tự',
        ];
    }
}
