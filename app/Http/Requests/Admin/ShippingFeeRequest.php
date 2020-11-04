<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ShippingFeeRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'shipping_fee' => 'required|numeric',
        ];
    }

    public function messages() {
        return [
            // ['Tên trường input'] => ['Ràng buộc']|['Ràng buộc']:['Tên bảng'],['Tên cột trong bảng']
            'shipping_fee.required' => 'Trường bắt buộc nhập',
            'shipping_fee.numeric' => 'Phí vận chuyển phải là số',
        ];
    }
}
