<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\KeywordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Keyword;
use Carbon\Carbon;

class KeywordController extends AdminController {
	public function index() {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
    	$keywords = Keyword::paginate(10);
    	$data = [
    		'keywords' => $keywords,
    	];
    	return view('admin.keyword.index', $data);
    }

    public function create() {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
    	return view('admin.keyword.create');
    }
	public function created(KeywordRequest $request) {
    	$data = $request->except('_token');
     	$data['slug'] = Str::slug($request->name);
    	$data['created_at'] = Carbon::now();
		$id = Keyword::insertGetId($data);
        \Alert::success('Thành công', 'Thêm mới từ khóa');
		return redirect()->to('/admin/keyword');
    }

    public function update($id) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
    	$keyword = Keyword::find($id);
    	return view('admin.keyword.update', compact('keyword'));
    }

	public function updated(KeywordRequest $request, $id) {
    	$keyword = Keyword::find($id);
    	$data = $request->except('_token');
     	$data['slug'] = Str::slug($request->name);
    	$data['updated_at'] = Carbon::now();
		$keyword->update($data);
        \Alert::success('Thành công', 'Cập nhật từ khóa');
		return redirect()->to('/admin/keyword');
    }

    public function hot($id) {
    	$keyword = Keyword::find($id);
    	$keyword->hot = !$keyword->hot;
    	$keyword->save();
        \Alert::success('Thành công', 'Cập nhật trạng thái');
		return redirect()->back();
    }

    public function delete($id) {
    	$keyword = Keyword::find($id);
    	if ($keyword)
    		$keyword->delete();
        \Alert::info('Thông báo', 'Đã xóa từ khóa');
    	return redirect()->back();
    }
}
