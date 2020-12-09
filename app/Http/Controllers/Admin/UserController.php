<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Guest\RegisterRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisteredUser;

class UserController extends AdminController {

    public function index(Request $request) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
        $users = User::where('role', 3);

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

        $users = $users->orderByDesc('id')->paginate(10);

    	$data = [
    		'users' => $users,
    	];
    	return view('admin.user.index', $data);
    }

    public function create() {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
    	return view('admin.user.create');
    }

	public function created(RegisterRequest $request) {
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
            \Alert::warning('Thông báo', 'Vui lòng xác nhận trong email để hoàn thành đăng ký!');
            Mail::to($request->email)->send(new RegisteredUser($result, $request->full_name));
            return redirect()->back();
        } else {
            \Session::put('failedRegister', 'Thông tin tài khoản không hợp lệ!');
            return redirect()->back();
        }
    }

    public function update($id) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
    	$user = User::findOrFail($id);
    	return view('admin.User.update', compact('user'));
    }

	public function updated(UserRequest $request, $id) {
    	$User = User::find($id);
    	$data = $request->except('_token', 'avatar', 'attribute');
     	$data['slug'] = Str::slug($request->name);
    	$data['updated_at'] = Carbon::now();
        if($data['sale'])
            $data['price'] = $data['price_old'] - ($data['price_old']*($data['sale']/100));
        else
            $data['price'] = $data['price_old'];
		if ($request->avatar) {
            $avatar = upload_image('avatar');
            if ($avatar['code'] == 1)
                $data['avatar'] = $avatar['name'];
        }

        $result = $User->update($data);
        if ($id) {
            $this->syncAttribute($request->attribute, $id);
        }
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
