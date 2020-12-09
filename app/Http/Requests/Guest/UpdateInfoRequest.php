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
            'phone' =>  [
                'required',
                'regex:/(086|096|097|098|032|033|034|035|036|037|038|039|088|091|094|083|084|085|081|082|089|090|093|070|079|077|076|078|092|056|058|099|059)[0-9]{7}/',
                'min:10',
                'max:10'
            ],
        ];
    }

    public function messages() {
        return [
            // ['Tên trường input'] => ['Ràng buộc']|['Ràng buộc']:['Tên bảng'],['Tên cột trong bảng']
            'full_name.required' => 'Vui lòng không để trống',
            'full_name.min' => 'Vui lòng nhập ít nhất 3 ký tự',
            'phone.required' => 'Vui lòng không để trống',
            'phone.regex' => 'Vui lòng nhập số điện thoại hợp lệ',
            'phone.min' => 'Số điện thoại hợp lệ có 10 số',
            'phone.max' => 'Số điện thoại hợp lệ có 10 số',
        ];
    }
}
