<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Location;
use App\Models\Order;
use Carbon\Carbon;

class CartController extends GuestController {
    public function index() {
        $cartItems = \Cart::content();
        $cities = Location::where('type', 1)->get();
        $pageTitle = 'Giỏ hàng';
        $data = [
            'cartItems' => $cartItems,
            'cities' => $cities,
            'pageTitle' => $pageTitle,
            'pageTitle' => 'Chi tiết giỏ hàng',
            'bodyClass' => 'woocommerce-cart woocommerce-page page',
        ];
        return view('guest.cart.index', $data);
    }

    public function add($id) {
        $product = Product::find($id);
        if (!$product) 
            return redirect()->to('/');
    	\Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
            'weight' => 0,
            'options' => [
                'price_old' => $product->price_old, 
                'sale' => $product->sale,
                'image' => $product->avatar,
            ],
        ]);
        \Session::flash('toastr', [
            'type' => 'success',
            'message' => 'Đã thêm vào giỏ hàng',
        ]);
        return redirect()->back();
    }


    public function update($slug) {
        $arrSlug = explode('-', $slug);
        // Mỗi lần pop mảng sẽ mất 1 phần tử đó(phần tử cuối)
        $qty = array_pop($arrSlug);
        $rowId = array_pop($arrSlug);
    	\Cart::update($rowId, $qty);
        return redirect()->back();
    }

    public function delete($rowId) {
        \Session::flash('toastr', [
            'type' => 'info',
            'message' => 'Đã xóa sản phẩm khỏi giỏ hàng',
        ]);
    	\Cart::remove($rowId);
        return redirect()->back();
    }

	public function pay(Request $request) {
        $data = $request->except('_token');

        if (isset(\Auth::user()->id)) {
            $data['user_id'] = \Auth::user()->id;

            // ---- Dùng để lưu thông tin tài khoản nếu TK chưa có thông tin địa chỉ -----------
            // if (!isset(\Auth::user()->city)) {
            //     \DB::table('users')
            //         ->where('id', $data['user_id'])
            //         ->update([
            //             'phone' => $data['phone'],
            //             'street_address' => $data['street_address'],
            //             'city' => $data['city'],
            //             'district' => $data['district'],
            //             'ward' => $data['ward'],
            //         ]);
            // } 
        }  
        $data['total_money'] = str_replace(',','', \Cart::subtotal(0));
        $data['created_at'] = Carbon::now();
        $transactionId = Transaction::insertGetId($data);
        if ($transactionId) {
            $cartItems = \Cart::content();
            foreach ($cartItems as $key => $item) {
                // Lưu đơn hàng
                Order::insert([
                    'transaction_id' => $transactionId,
                    'product_id' => $item->id,
                    'sale' => $item->options->sale,
                    'quantity' => $item->qty,
                    'product_price' => $item->price,
                    'total_price' => $item->price * $item->qty,
                ]);

                // Tăng số lượng mua (+1 cho cột 'pay' của bảng 'products')
                Product::where('id', $item->id)->increment('paid');
            }
        }
        \Session::flash('toastr', [
            'type' => 'success',
            'message' => 'Tạo đơn hàng thành công',
        ]);
        \Cart::destroy();
        return redirect()->to('/');
    }

    // Load Tỉnh/Thành phố, Quận/Huyện,...
    public function getLocation(Request $request) {
        $parentId = $request->parent;
        if ($parentId)
            $locations = Location::where('parent_id', $parentId)->get();
        return response(['data' => $locations]);
    }
}
