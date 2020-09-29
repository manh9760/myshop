<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
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
            'name' => 'required|min:2|unique:attributes,name,'.$this->id,
            'type' => 'required',
            'category_id' => 'required',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Trường bắt buộc nhập',
            'name.unique' => 'Thuộc tính đã tồn tại',
            'name.min' => 'Tên thuộc tính phải ít nhất 2 ký tự',
            'type.required' => 'Trường bắt buộc nhập',
            'category_id.required' => 'Trường bắt buộc nhập',
        ];
    }
}
