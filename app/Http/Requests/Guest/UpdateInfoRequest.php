<?php

namespace App\Http\Requests\Guest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInfoRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules()
    {
        return [
            'full_name' => 'required|min:3',
            'phone' =>  'required|regex:/(0)[0-9]{9}/',
        ];
    }

    public function messages() {
        return [
            // ['Tên trường input'] => ['Ràng buộc']|['Ràng buộc']:['Tên bảng'],['Tên cột trong bảng']
            'full_name.required' => 'Vui lòng không để trống',
            'full_name.min' => 'Vui lòng nhập ít nhất 3 ký tự',
            'phone.regex' => 'Vui lòng nhập số điện thoại hợp lệ',
            'phone.required' => 'Vui lòng không để trống',
        ];
    }
}
