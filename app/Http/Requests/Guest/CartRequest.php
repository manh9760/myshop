<?php

namespace App\Http\Requests\Guest;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules()
    {
        return [
            'full_name' => 'required|min:5',
            'phone' => 'required',
            'email' => 'required',
            'city' => 'numeric',
            'district' => 'numeric',
            'ward' => 'numeric',
            'street_address' => 'required|min:5',
        ];
    }

    public function messages() {
        return [
            // ['Tên trường input'] => ['Ràng buộc']|['Ràng buộc']:['Tên bảng'],['Tên cột trong bảng']
            'full_name.required' => 'Vui lòng nhập Tên người nhận',
            'full_name.min' => 'Tên khách hàng phải ít nhất 5 ký tự',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'email.required' => 'Vui lòng nhập địa chỉ email',
            'city.numeric' => 'Vui lòng chọn Tỉnh/Thành phố',
            'district.numeric' => 'Vui lòng chọn Quận/Huyện',
            'ward.numeric' => 'Vui lòng chọn Xã/Phường/Thị trấn',
            'street_address.required' => 'Vui lòng nhập Số nhà/Tên đường/Thôn/Ấp',
            'street_address.min' => 'Vui lòng nhập Số nhà/Tên đường/Thôn/Ấp',
        ];
    }
}
