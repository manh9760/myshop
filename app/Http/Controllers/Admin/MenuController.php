<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\MenuRequest;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Str;
use Carbon\Carbon;

class MenuController extends AdminController {
    public function index() {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
    	$menus = Menu::paginate(10);
    	$data = [
    		'menus' => $menus,
    	];
    	return view('admin.menu.index', $data);
    }

    public function create() {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
    	return view('admin.menu.create');
    }

	public function created(MenuRequest $request) {
    	$data = $request->except('_token');
     	$data['slug'] = Str::slug($request->name);
    	$data['created_at'] = Carbon::now();
		$id = Menu::insertGetId($data);
		\Alert::success('Thành công', 'Thêm mới danh mục bài viết');
		return redirect()->to('/admin/menu');
    }

    public function update($id) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
    	$menu = Menu::find($id);
    	return view('admin.menu.update', compact('menu'));
    }

	public function updated(MenuRequest $request, $id) {
    	$menu = Menu::find($id);
    	$data = $request->except('_token');
     	$data['slug'] = Str::slug($request->name);
    	$data['updated_at'] = Carbon::now();
		$menu->update($data);
		return redirect()->back();
    }

    public function status($id) {
    	$menu = Menu::find($id);
    	$menu->status = !$menu->status;
    	$menu->save();
		return redirect()->back();
    }

    public function delete($id) {
    	$menu = Menu::find($id);
    	if ($menu)
    		$menu->delete();
    	return redirect()->back();
    }
}
