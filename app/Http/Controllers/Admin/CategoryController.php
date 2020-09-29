<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends AdminController {
    public function index() {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');

    	$categories = Category::paginate(10);
    	$data = [
    		'categories' => $categories,
    	];
    	return view('admin.category.index', $data);
    }

    public function create() {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
    	return view('admin.category.create');
    }

	public function created(CategoryRequest $request) {
    	$data = $request->except('_token');
     	$data['slug'] = Str::slug($request->name);
    	$data['created_at'] = Carbon::now();
		$id = Category::insertGetId($data);
        \Alert::success('Thành công', 'Thêm mới danh mục');
		return redirect()->to('/admin/category');
    }

    public function update($id) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
    	$category = Category::find($id);
    	return view('admin.category.update', compact('category'));
    }

	public function updated(CategoryRequest $request, $id) {
    	$category = Category::find($id);
    	$data = $request->except('_token');
     	$data['slug'] = Str::slug($request->name);
    	$data['updated_at'] = Carbon::now();
		$category->update($data);
        \Alert::success('Thành công', 'Cập nhật danh mục');
		return redirect()->to('/admin/category');
    }

    public function active($id) {
    	$category = Category::find($id);
    	$category->status = !$category->status;
    	$category->save();
        \Alert::success('Thành công', 'Cập nhật trạng thái');
		return redirect()->back();
    }

    public function delete($id) {
    	$category = Category::find($id);
    	if ($category)
    		$category->delete();
        \Alert::info('Thông báo', 'Đã xóa danh mục');
    	return redirect()->back();
    }
}
