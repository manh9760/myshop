<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Menu;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostController extends AdminController {
    public function index(Request $request) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');

        $posts = Post::with('menu:id,name');
        $menus = Menu::all();
        // Các điều kiện lọc
        if ($title = $request->title) {
            $posts->where('title', 'like', '%'.$title.'%');
        }
        if ($menu = $request->menu) {
            $posts->where('menu_id', $menu);
        }
        if ($status = $request->status) {
            switch ($status) {
                case 1:
                    $posts->where('active', 1);
                    break;
                case 2:
                    $posts->where('active', 0);
                    break;
            }   
        }

        $posts = $posts->orderByDesc('id')->paginate(10);
    	
        $data = [
    		'posts' => $posts,
    	    'menus' => $menus,
        ];
    	return view('admin.post.index', $data);
    }

    public function create() {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
    	$menus = Menu::all();
        $data = [
            'menus' => $menus,
        ];
    	return view('admin.post.create', $data);
    }

	public function created(PostRequest $request) {
    	$data = $request->except('_token', 'avatar');
     	$data['slug'] = Str::slug($request->title);
    	$data['created_at'] = Carbon::now();
        if ($request->avatar) {
            $avatar = upload_image('avatar');
            if ($avatar['code'] == 1)
                $data['avatar'] = $avatar['name'];
        }
		$id = Post::insertGetId($data);
		\Alert::success('Thành công', 'Thêm mới bài viết');
        return redirect()->to('/admin/post');
    }

    public function update($id) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
        $post = Post::findOrFail($id);
        $menus = Menu::all();

        $data = [
            'post' => $post,
            'menus' => $menus,
        ];
        return view('admin.post.update', $data);
    }

    public function updated(PostRequest $request, $id) {
        $post = Post::find($id);
        $data = $request->except('_token', 'avatar');
        $data['slug'] = Str::slug($request->title);
        $data['updated_at'] = Carbon::now();

        if ($request->avatar) {
            $avatar = upload_image('avatar');
            if ($avatar['code'] == 1)
                $data['avatar'] = $avatar['name'];
        }

        $result = $post->update($data);
        \Alert::success('Thành công', 'Cập nhật bài viết');
        return redirect()->to('/admin/post');
    }

    public function active($id) {
        $post = Post::find($id);
        $post->active = !$post->active;
        $post->save();
        \Alert::success('Thành công', 'Cập nhật trạng thái bài viết');
        return redirect()->back();
    }

    public function delete($id) {
        $post = Post::find($id);
        if ($post)
            $post->delete();
        \Alert::info('Thông báo', 'Đã xóa bài viết');
        return redirect()->back();
    }
}
