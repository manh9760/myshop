<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Guest\RegisterRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisteredUser;
use App\Http\Requests\Guest\UpdateInfoRequest;

class UserController extends AdminController {

    public function index(Request $request) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');

        if (\Session::get('adminRole') == 1) {
            $users = User::whereRaw(1);
        } else {
            $users = User::where('role', 3);
        }

        // Các điều kiện lọc
        if ($name = $request->name) {
            $users->where('full_name', 'like', '%'.$name.'%');
        }
        if ($phone = $request->phone) {
            $users->where('phone', 'like', '%'.$phone.'%');
        }
        if ($email = $request->email) {
            $users->where('email', 'like', '%'.$email.'%');
        }

        if ($user_active = $request->user_active) {
            switch ($user_active) {
                case 1:
                    $users->where('active', 1);
                    break;
                case 0:
                    $users->where('active', 0);
                    break;
            }   
        }

        if ($user_role = $request->user_role) {
            switch ($user_role) {
                case 3:
                    $users->where('role', 3);
                    break;
                case 2:
                    $users->where('role', 2);
                    break;
                case 1:
                    $users->where('role', 1);
                    break;
            }   
        }

        $users = $users->orderByDesc('id')->paginate(10);

    	$data = [
    		'users' => $users,
            'query' => $request->query(),
    	];
    	return view('admin.user.index', $data);
    }

    public function create() {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        $isUpdateUser = false;
        
    	return view('admin.user.create', compact('isUpdateUser'));
    }

	public function created(RegisterRequest $request) {
		$data = $request->except('_token', 'confirm_password', 'user_id');
        $confirm_password = md5($request->confirm_password);
        $data['password'] = md5($data['password']);
        $data['created_at'] = Carbon::now();

        if ($confirm_password != $data['password']) {
            \Session::put('failedRegister', 'Mật khẩu nhập lại không đúng!');
            return redirect()->back();
        }

        // Nếu là tài khoản khách mới cần xác minh
        if ($data['role'] != 3) {
            $data['active'] = 1;
        }

		// Trả về id của user vừa thêm vào db
        $result = User::insertGetId($data);
     
        if ($result) {
            if($data['role'] != 3) {
                \Alert::warning('Thành công', 'Tạo mới người dùng thành công!');
            } else {
                \Alert::warning('Thông báo', 'Vui lòng xác nhận trong email để hoàn thành đăng ký!');
                Mail::to($request->email)->send(new RegisteredUser($result, $request->full_name));
            }
            return redirect()->to('/admin/user');
        } else {
            \Session::put('failedRegister', 'Thông tin tài khoản không hợp lệ!');
            return redirect()->back();
        }
        
    }

    public function update($id) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
        $isUpdateUser = true;
    	$user = User::findOrFail($id);
    	return view('admin.User.update', compact('user', 'isUpdateUser'));
    }

	public function updated(UpdateInfoRequest $request, $id) {
        $data = $request->except('_token');
        $data['updated_at'] = Carbon::now();

        $user = User::find($data['user_id']);
        $user->full_name = $data['full_name'];
        $user->phone = $data['phone'];
        $user->role = $data['role'];
        $user->save();
        \Alert::success('Thành công', 'Cập nhật tài khoản');
        return redirect()->to('/admin/user');
    }

    public function hot($id) {
    	$User = User::find($id);
    	$User->hot = !$User->hot;
    	$User->save();
        \Alert::success('Thành công', 'Cập nhật trạng thái');
		return redirect()->back();
    }

    public function active($id) {
    	$User = User::find($id);
    	$User->active = !$User->active;
    	$User->save();
        \Alert::success('Thành công', 'Cập nhật trạng thái');
		return redirect()->back();
    }

    public function delete($id) {
    	$User = User::find($id);
    	if ($User)
    		$User->delete();
        \Alert::info('Thông báo', 'Đã xóa tài khoản');
    	return redirect()->back();
    }
}
