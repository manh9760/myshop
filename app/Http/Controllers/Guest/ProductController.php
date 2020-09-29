<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Post;

class ProductController extends GuestController {

    protected function syncAttributeGroup() {
        $attributes = Attribute::get();
        $groupAttribute = [];
        foreach ($attributes as $key => $attribute) {
            $key = $attribute->gettype($attribute->type)['name'];
            $groupAttribute[$key][] = $attribute;
        }
        return $groupAttribute;
    }

    public function getProductList() {
        $products = Product::where('active', 1)
            ->orderByDesc('id')
            ->select('id', 'name', 'slug', 'avatar', 'price', 'price_old', 'sale', 'description')
            ->paginate(16);

        $mostBoughtProducts = Product::where('active', 1)
            ->where('paid', '>', 0)
            ->orderByDesc('paid')
            ->select('id', 'name', 'slug', 'avatar', 'price', 'price_old', 'sale', 'description')
            ->paginate(16);

        $posts = Post::where('active', 1)->orderByDesc('id')->limit(4)->get();

        // Không muốn hiển thị sản phẩm top sale bên aside
        $saleProducts = null;
        $attributes = $this->syncAttributeGroup();
        $data = [
            'products' => $products,
            'mostBoughtProducts' => $mostBoughtProducts,
            'attributes' => $attributes,
            'posts' => $posts,
            'saleProducts' => $saleProducts,
            'pageTitle' => 'Linh kiện máy tính',
            'bodyClass' => 'post-type-archive-product',
        ];
        return view('guest.index', $data);
    }

    public function getProductListByCategory($slug) {
        $arrSlug = explode('-', $slug);
        $categoryID = array_pop($arrSlug);
        $category = Category::findOrFail($categoryID);
        $products = Product::where([
                'active' => 1,
                'category_id' => $categoryID,
            ])
            ->orderByDesc('id')
            ->select('id', 'name', 'slug', 'avatar', 'price', 'price_old', 'sale', 'description')
            ->paginate(16);

        $posts = Post::where('active', 1)->orderByDesc('id')->limit(4)->get();
        
        // Không muốn hiển thị sản phẩm top sale bên aside
        $saleProducts = null;
        $attributes = $this->syncAttributeGroup();
        $data = [
            'products' => $products,
            'attributes' =>$attributes,
            'categoryID' => $categoryID,
            'category' => $category,
            'posts' =>$posts,
            'saleProducts' => $saleProducts,
            'pageTitle' => $category->name,
            'bodyClass' => 'post-type-archive-product',
        ];
        return view('guest.product.list', $data);
    }

    public function getProductDetail(Request $request, $slug) {
    	$arrSlug = explode('-', $slug);
    	$id = array_pop($arrSlug);
    	if($id) {
            $product = Product::with('category:id,name,slug', 'keywords')->findOrFail($id);
            $posts = Post::where('active', 1)->orderByDesc('id')->limit(4)->get();
            $saleProducts = Product::where('active', 1)
                ->where('sale', '>', 0)
                ->orderByDesc('sale')
                ->limit(4)
                ->get();
            $attributes = $this->syncAttributeGroup();
    		$data = [
    			'product' => $product,
                'suggestedProducts' => $this->getSuggestedProducts($product->category_id),
                'attributes' =>$attributes,
                'posts' =>$posts,
                'saleProducts' => $saleProducts,
                'pageTitle' => $product->name,
                'bodyClass' => 'single-product',
    		];
    		return view('guest.product.detail', $data);
    	}
    	return redirect()->to('/');
    }

    // Lấy sản phẩm liên quan
    private function getSuggestedProducts($categoryId) {
        $products = Product::where([
                'active' => 1,
                'category_id' => $categoryId,
            ])
            ->orderByDesc('id')
            ->select('id', 'name', 'slug', 'avatar', 'price', 'price_old', 'sale')
            ->paginate(3);
        return $products;
    }
}
