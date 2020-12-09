<?php

namespace App\Http\Requests\Guest;

use Illuminate\Foundation\Http\FormRequest;

class LostPasswordRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'unique:users,email',
        ];
    }

    public function messages() {
        return [
            'email.unique' => '(Địa chỉ Email này đã được đăng ký)',
        ];
    }
}
