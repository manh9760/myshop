<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Guest\CreatePasswordRequest;

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

    public function getInputEmailForm() {
        return view('admin.auth.lostPassword');
    }

    public function sendEmail(Request $request) {
        $data = $request->except('_token');
        $email = $data['email'];
        $isEmailValid = false;
        $users = User::whereRaw(1)->get();
        $userId = 0;

        if ($email == '') {
            \Session::put('invalidEmail', 'Vui lòng nhập email!');
            return redirect()->back();
        }

        foreach ($users as $user) {
            if ($email == $user->email) {
                $userId = $user->id;
                $isEmailValid = true;
                break;
            }
        }

        if ($isEmailValid) {
            Mail::to($email)->send(new ResetPasswordAdmin($userId));
            \Session::put('sentEmail', 'Truy cập vào email để tiến hành lấy mật khẩu!');
            return redirect()->to('/admin');
        } else {
            \Session::put('invalidEmail', 'Địa chỉ email này chưa đăng ký!');
            return redirect()->back();
        }
    }

    public function createPassword($userId) {
        $userId = $userId;
        return view('admin.auth.createPassword', compact('userId'));
    }

    public function savePassword(Request $request) {
        $data = $request->except('_token', 'confirm_password');
        $user = User::findOrFail($data['user_id']);

        if (strlen($data['password']) < 8) {
            \Session::put('invalidConfirmPassword', 'Mật khẩu chứa ít nhất 8 ký tự!');
            return redirect()->back();
        }

        $confirm_password = md5($request->confirm_password);
        $data['password'] = md5($data['password']);
        $data['updated_at'] = Carbon::now();

        if ($confirm_password != $data['password']) {
            \Session::put('invalidConfirmPassword', 'Mật khẩu nhập lại không đúng!');
            return redirect()->back();
        }

        $user->password = $data['password'];
        $user->updated_at = $data['updated_at'];
        $user->save();
        \Session::put('createdNewPassword', 'Tạo mới mật khẩu thành công!');
        return redirect()->to('/admin');
    }

    public function logout(Request $request) {
        \Session::put('adminId', null);
        \Session::put('adminFullName', null);
        \Session::put('adminRole', null);
        return redirect()->to('/admin/login');
    }
}
