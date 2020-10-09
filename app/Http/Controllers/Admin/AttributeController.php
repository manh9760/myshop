<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AttributeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Attribute;
use App\Models\Category;
use Carbon\Carbon;

class AttributeController extends AdminController {
	public function index() {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
        // select `id`, `name` from `categories`where `categories`.`id`
    	$attributes = Attribute::with('category:id,name')->orderByDesc('id')->get();
    	$data = [
    		'attributes' => $attributes,
    	];
    	return view('admin.attribute.index', $data);
    }

    public function create() {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        $categories = Category::all();
    	return view('admin.attribute.create', compact('categories'));
    }
	public function created(AttributeRequest $request) {
    	$data = $request->except('_token');
     	$data['slug'] = Str::slug($request->name);
    	$data['created_at'] = Carbon::now();
		$id = attribute::insertGetId($data);
        \Alert::success('Thành công', 'Thêm mới thuộc tính');
		return redirect()->to('/admin/attribute');
    }

    public function update($id) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
    	$attribute = Attribute::find($id);
        $categories = Category::select('id', 'name')->get();
    	return view('admin.attribute.update', compact('attribute', 'categories'));
    }

	public function updated(AttributeRequest $request, $id) {
    	$attribute = Attribute::find($id);
    	$data = $request->except('_token');
     	$data['slug'] = Str::slug($request->name);
    	$data['updated_at'] = Carbon::now();
		$attribute->update($data);
        \Alert::success('Thành công', 'Cập nhật thuộc tính');
		return redirect()->to('/admin/attribute');
    }

    public function hot($id) {
    	$attribute = Attribute::find($id);
    	$attribute->hot = !$attribute->hot;
    	$attribute->save();
        \Alert::success('Thành công', 'Cập nhật trạng thái thuộc tính');
		return redirect()->back();
    }

    public function delete($id) {
    	$attribute = Attribute::find($id);
    	if ($attribute)
    		$attribute->delete();
        \Alert::info('Thông báo', 'Đã xóa thuộc tính');
    	return redirect()->back();
    }
}
