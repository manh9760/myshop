<?php

namespace App\Http\Requests\Guest;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest {
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
            'full_name' => 'required|min:3',
            'phone' =>  'required|regex:/(0)[0-9]{9}/',
            'email' => 'required|unique:users,email,'.$this->id,
            'password' => 'required|min:8',
        ];
    }

    public function messages() {
        return [
            'full_name.required' => '(Vui lòng nhập Họ tên)',
            'full_name.min' => '(Họ tên phải chứa ít nhất 3 ký tự)',
            'phone.required' => '(Vui lòng không để trống)',
            'phone.regex' => '(Vui lòng nhập số điện thoại hợp lệ)',
            'email.required' => '(Vui lòng nhập Địa chỉ Email)',
            'email.unique' => '(Địa chỉ Email này đã được đăng ký)',
            'password.required' => '(Vui lòng nhập Mật khẩu)',
            'password.min' => '(Mật khẩu phải chứa ít nhất 8 ký tự)',
        ];
    }
}
