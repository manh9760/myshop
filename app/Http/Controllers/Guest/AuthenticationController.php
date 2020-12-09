<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Requests\Guest\LoginRequest;
use App\Http\Requests\Guest\RegisterRequest;
use App\Http\Requests\Guest\CreatePasswordRequest;
use App\User;
use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisteredUser;
use App\Mail\ResetPassword;

class AuthenticationController extends GuestController {

    public function getRegisterForm () {
    	$pageTitle = 'Đăng ký thành viên';
        $bodyClass = 'page woocommerce-checkout';
        $saleProducts = Product::where('active', 1)
            ->where('sale', '>', 0)
            ->orderByDesc('sale')
            ->limit(4)
            ->get();
        return view('guest.auth.register', compact('pageTitle', 'bodyClass', 'saleProducts'));
    }

    public function register(RegisterRequest $request) {
        $data = $request->except('_token', 'confirm_password');
        $confirm_password = md5($request->confirm_password);
        $data['password'] = md5($data['password']);
        $data['created_at'] = Carbon::now();

        if ($confirm_password != $data['password']) {
            \Session::put('failedRegister', 'Mật khẩu nhập lại không đúng!');
            return redirect()->back();
        }
        
        // Trả về id của user vừa thêm vào db
        $result = User::insertGetId($data);
        if ($result) {
        	\Session::flash('toastr', [
	            'type' => 'info',
	            'message' => 'Vui lòng xác nhận trong email để hoàn thành đăng ký!',
	        ]);
            Mail::to($request->email)->send(new RegisteredUser($result, $request->full_name));
            return redirect()->route('get.login');
        } else {
            \Session::put('failedRegister', 'Thông tin tài khoản không hợp lệ!');
            return redirect()->back();
        }
    }

    public function getLoginForm() {
        if ($this->isLogined()) {
            return redirect()->to('/');
        }
        $pageTitle = 'Đăng nhập';
        $bodyClass = 'page woocommerce-checkout';
        $saleProducts = Product::where('active', 1)
            ->where('sale', '>', 0)
            ->orderByDesc('sale')
            ->limit(4)
            ->get();
    	return view('guest.auth.login', compact('pageTitle', 'bodyClass', 'saleProducts'));
    }

    public function login(LoginRequest $request) {
        $data = $request->except('_token');
        $result = \DB::table('users')
            ->where('email', $data['email']) 
            ->where('password', md5($data['password']))
            ->where('active', 1)
            ->first();

        if ($result) {
            \Session::put('userId', $result->id);
            \Session::put('userEmail', $result->email);
            \Session::put('userFullName', $result->full_name);

            \Session::flash('toastr', [
                'type' => 'success',
                'message' => 'Đăng nhập thành công!',
            ]);
            return redirect()->intended('/');
        } else {
            \Session::put('failedLogin', 'Tài khoản không đúng!');
            return redirect()->back();
        }
    }

    public function getLostPasswordForm() {
        $bodyClass = 'page';
        $pageTitle = 'Lấy lại mật khẩu';
        $saleProducts = Product::where('active', 1)
            ->where('sale', '>', 0)
            ->orderByDesc('sale')
            ->limit(4)
            ->get();
        return view('guest.auth.lostPassword', compact('bodyClass', 'pageTitle', 'saleProducts'));
    }

    public function resetPassword(Request $request) {
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
            Mail::to($email)->send(new ResetPassword($userId));
            \Session::flash('toastr', [
                'type' => 'info',
                'message' => 'Truy cập vào email để tiến hành lấy mật khẩu!',
            ]);
            return redirect()->route('get.login');
        } else {
            \Session::put('invalidEmail', 'Địa chỉ email này chưa đăng ký!');
            return redirect()->back();
        }
    }

    public function createPasswordForm($userId) {
        $user = User::findOrFail($userId);
        $pageTitle = 'Tạo mật khẩu mới';
        $bodyClass = 'page woocommerce-checkout';
        $saleProducts = Product::where('active', 1)
            ->where('sale', '>', 0)
            ->orderByDesc('sale')
            ->limit(4)
            ->get();
        $data = [
            'user' => $user,
            'pageTitle' =>$pageTitle,
            'bodyClass' => $bodyClass,
            'saleProducts' => $saleProducts,
        ];
        return view('guest.auth.createPassword', $data);
    }

    public function savePassword(CreatePasswordRequest $request, $userId) {
        $user = User::findOrFail($userId);
        $data = $request->except('_token', 'confirm_password');
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
        \Session::flash('toastr', [
            'type' => 'success',
            'message' => 'Tạo mật khẩu mới thành công!',
        ]);
        return redirect()->route('get.login');
    }

    public function logout(Request $request) {
        \Session::put('userId', null);
        \Session::put('userEmail', null);
        \Session::put('userFullName', null);
        return redirect()->to('/');
    }
}
