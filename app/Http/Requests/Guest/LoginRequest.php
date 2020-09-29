<?php

namespace App\Http\Requests\Guest;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest {
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
            'email' => 'required',
            'password' => 'required|min:8',
        ];
    }

    public function messages() {
        return [
            'email.required' => '(Vui lòng nhập Địa chỉ Email)',
            'password.required' => '(Vui lòng nhập Mật khẩu)',
            'password.min' => '(Mật khẩu phải chứa ít nhất 8 ký tự)',
        ];
    }
}
