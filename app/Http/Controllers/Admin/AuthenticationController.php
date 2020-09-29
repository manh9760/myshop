<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends AdminController {
    public function getLoginForm() {
        if ($this->isLogined()) {
            return redirect()->to('/admin');
        }
    	return view('admin.auth.login');
    }

    public function login(Request $request) {
        $data = $request->except('_token');
        $result = \DB::table('users')
            ->where('email', $data['email']) 
            ->where('password', md5($data['password']))
            ->first();

        if ($result && ($result->role == 1 || $result->role == 2)) {
            \Session::put('adminId', $result->id);
            \Session::put('adminFullName', $result->full_name);
            \Session::put('adminRole', $result->role);
            \Alert::success('Thành công', 'Đăng nhập vào trang quản trị');
            return redirect()->intended('/admin');
        } elseif ($result && ($result->role == 3)) {
            \Session::put('errorLogin', 'Bạn không có quyền truy cập!');
            return redirect()->back();
        } else {
            \Session::put('errorLogin', 'Tài khoản không đúng!');
            return redirect()->back();
        }
    }

    public function logout(Request $request) {
        \Session::put('adminId', null);
        \Session::put('adminFullName', null);
        \Session::put('adminRole', null);
        return redirect()->to('/admin/login');
    }
}
