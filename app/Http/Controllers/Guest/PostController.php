<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Post;

class PostController extends GuestController {
    public function getPostList() {
        $postList = Post::where('active', 1)->paginate(10);
        $posts = null;
        $saleProducts = Product::where('active', 1)
            ->where('sale', '>', 0)
            ->orderByDesc('sale')
            ->limit(4)
            ->get();
        $data = [
            'postList' => $postList,
            'posts' => $posts,
            'saleProducts' => $saleProducts,
        	'pageTitle' => 'Tin tức công nghệ',
            'bodyClass' => 'blog template-one-column-grid',
        ];
        return view('guest.post.list', $data);
    }

    public function getPostDetail(Request $request, $slug) {
		$arrSlug = explode('-', $slug);
    	$id = array_pop($arrSlug);
    	if($id) {
            $posts = Post::where('active', 1)->orderByDesc('id')->limit(4)->get();
            $post = Post::findOrFail($id);
            $saleProducts = Product::where('active', 1)
                ->where('sale', '>', 0)
                ->orderByDesc('sale')
                ->limit(4)
                ->get();
    		$data = [
    			'post' => $post,
                'posts' => $posts,
                'saleProducts' => $saleProducts,
    			'pageTitle' => $post->title,
                'bodyClass' => 'single',
                'suggestedPosts' => $this->getSuggestedPosts($post->menu_id),
    		];
    		return view('guest.post.detail', $data);
    	}
    	return redirect()->to('/');
    }

    // Lấy bài viết liên quan
    private function getSuggestedPosts($menuId) {
        $posts = Post::where([
                'active' => 1,
                'menu_id' => $menuId,
            ])
            ->orderByDesc('id')
            ->select('id', 'title', 'slug', 'avatar', 'view', 'description', 'content', 'created_at')
            ->paginate(4);
        return $posts;
    }
}
