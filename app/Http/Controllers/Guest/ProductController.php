<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Post;
use App\Models\Transaction;
use App\Models\Order;
use App\Services\ProcessViewService;
use Illuminate\Support\Facades\Mail;

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

    public function getProductList(Request $request) {
        // Mail::to('minhlam58010@gmail.com')->send(new OrderShipped());

        // Lấy thuộc tính lọc sản phẩm
        $paramAttrSearch = $request->except('price', 'page', 'searchQuery');
        $paramAttrSearch = array_values($paramAttrSearch);

        $products = Product::where('active', 1);

        if ($name = $request->searchQuery) {
            $products->where('name', 'like', '%'.$name.'%');
        }

        if (!empty($paramAttrSearch)) {
            $products->whereHas('attributes', function($query) use($paramAttrSearch) {
                $query->whereIn('pa_attribute_id', $paramAttrSearch);
            });
        }

        // if ($request->price) --> Nếu $request->price = 0 --> không vào switch
        if ($request->price != null) {
            $price = $request->price;
            switch ($price) {
                case 1:
                    $products->where('price', '<', 2000000);
                    break;
                case 2:
                    $products->where([
                        ['price', '>=', 2000000],
                        ['price', '<=', 6000000],
                    ]);
                    break;
                case 6:
                    $products->where([
                        ['price', '>=', 6000000],
                        ['price', '<=', 10000000],
                    ]);
                    break;
                case 10:
                    $products->where([
                        ['price', '>=', 10000000],
                        ['price', '<=', 14000000],
                    ]);
                    break;
                case 14:
                    $products->where([
                        ['price', '>=', 14000000],
                        ['price', '<=', 18000000],
                    ]);
                    break;
                case 18:
                    $products->where('price', '>', 18000000);
                    break;       
            }
        }

        $mostBoughtProducts = Product::where('active', 1)
            ->where('paid', '>', 0)
            ->orderByDesc('paid')
            ->select('id', 'name', 'slug', 'avatar', 'price', 'price_old', 'sale', 'description')
            ->paginate(16);

        $posts = Post::where('active', 1)->orderByDesc('id')->limit(4)->get();

        $products = $products
            ->orderByDesc('id')
            ->select('id', 'name', 'slug', 'avatar', 'price', 'price_old', 'price_entry', 'number', 'sale', 'description')
            ->paginate(16);

        // Không muốn hiển thị sản phẩm top sale bên aside
        $saleProducts = null;
        $attributes = $this->syncAttributeGroup();
        $data = [
            'products' => $products,
            'query' => $request->query(),
            'mostBoughtProducts' => $mostBoughtProducts,
            'attributes' => $attributes,
            'posts' => $posts,
            'saleProducts' => $saleProducts,
            'pageTitle' => 'Linh kiện máy tính',
            'bodyClass' => 'post-type-archive-product',
        ];
        return view('guest.index', $data);
    }

    public function getProductListByCategory(Request $request, $slug) {
        $arrSlug = explode('-', $slug);
        $categoryID = array_pop($arrSlug);
        $category = Category::findOrFail($categoryID);

        // Lấy thuộc tính lọc sản phẩm
        $paramAttrSearch = $request->except('price', 'page', 'searchQuery');
        $paramAttrSearch = array_values($paramAttrSearch);

        $products = Product::where([
            'active' => 1,
            'category_id' => $categoryID,
        ]);

        if ($name = $request->searchQuery) {
            $products->where('name', 'like', '%'.$name.'%');
        }

        if (!empty($paramAttrSearch)) {
            $products->whereHas('attributes', function($query) use($paramAttrSearch) {
                $query->whereIn('pa_attribute_id', $paramAttrSearch);
            });
        }

        // if ($request->price) --> Nếu $request->price = 0 --> không vào switch
        if ($request->price != null) {
            $price = $request->price;
            switch ($price) {
                case 1:
                    $products->where('price', '<', 2000000);
                    break;
                case 2:
                    $products->where([
                        ['price', '>=', 2000000],
                        ['price', '<=', 6000000],
                    ]);
                    break;
                case 6:
                    $products->where([
                        ['price', '>=', 6000000],
                        ['price', '<=', 10000000],
                    ]);
                    break;
                case 10:
                    $products->where([
                        ['price', '>=', 10000000],
                        ['price', '<=', 14000000],
                    ]);
                    break;
                case 14:
                    $products->where([
                        ['price', '>=', 14000000],
                        ['price', '<=', 18000000],
                    ]);
                    break;
                case 18:
                    $products->where('price', '>', 18000000);
                    break;       
            }
        }

        $posts = Post::where('active', 1)->orderByDesc('id')->limit(4)->get();

        $products = $products
            ->orderByDesc('id')
            ->select('id', 'name', 'slug', 'avatar', 'price', 'price_old', 'price_entry', 'number', 'sale', 'description')
            ->paginate(16);
        
        // Không muốn hiển thị sản phẩm top sale bên aside
        $saleProducts = null;
        $attributes = $this->syncAttributeGroup();
        $data = [
            'products' => $products,
            'query' => $request->query(),
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

            // Tính view sản phẩm 
            ProcessViewService::view('products', 'view', 'product', $id);

            // Kiểm tra tài khoản đang nhập đã mua sản phẩm này chưa để có thể đánh giá sản phẩm
            $isUserBought = false;
            $userId = \Session::get('userId');
            if ($userId) {
                $transactions = Transaction::where('user_id', $userId)->get();
                foreach ($transactions as $transaction) {
                    // Lấy sản phẩm (lấy cái đầu tiên là được) mà tài khoản đã mua
                    $order = Order::where('transaction_id', $transaction->id)->first();
                    if ($order->product_id == $id) {
                        $isUserBought = true;
                        break;
                    }
                }
            }

    		$data = [
    			'product' => $product,
                'suggestedProducts' => $this->getSuggestedProducts($product->category_id),
                'attributes' =>$attributes,
                'posts' =>$posts,
                'saleProducts' => $saleProducts,
                'isUserBought' => $isUserBought,
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
                ['number', '>', 0],
            ])
            ->orderByDesc('id')
            ->select('id', 'name', 'slug', 'avatar', 'price', 'price_old', 'number', 'sale')
            ->paginate(3);
        return $products;
    }
}
