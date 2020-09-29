<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class KeywordRequest extends FormRequest {
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
            'name' => 'required|min:3|unique:keywords,name,'.$this->id,
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Trường bắt buộc nhập',
            'name.unique' => 'Danh mục đã tồn tại',
            'name.min' => 'Tên danh mục phải ít nhất 3 ký tự',
        ];
    }
}
