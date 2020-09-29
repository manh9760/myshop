<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Guest\RegisterRequest;
use Illuminate\Http\Request;
use App\User;

class UserController extends AdminController {

    public function index() {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
        // select `id`, `name` from `categories`where `categories`.`id`
        $users = User::paginate(10);
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
        $data['password'] = Hash::make($data['password']);
        $data['created_at'] = Carbon::now();
		$id = User::insertGetId($data);
        \Alert::success('Thành công', 'Thêm mới người dùng');
		return redirect()->to('/admin/user');
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
