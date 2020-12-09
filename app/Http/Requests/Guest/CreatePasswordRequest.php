<?php

namespace App\Http\Requests\Guest;

use Illuminate\Foundation\Http\FormRequest;

class CreatePasswordRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules()
    {
        return [
            'password' => 'required|min:8',
        ];
    }

    public function messages() {
        return [
            'password.required' => 'Vui lòng không để trống',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ];
    }
}
