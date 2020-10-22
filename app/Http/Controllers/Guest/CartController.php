<?php

namespace App\Http\Controllers\Guest;

use App\Http\Requests\Guest\CartRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Location;
use App\Models\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\Invoice;
use App\Libraries\InlineEmail;

class CartController extends GuestController {

    public function index() {
        $cartItems = \Cart::content();
        $cities = Location::where('type', 1)->get();
        $user = User::find(\Session::get('userId'));
        $pageTitle = 'Giỏ hàng';
        $data = [
            'cartItems' => $cartItems,
            'cities' => $cities,
            'pageTitle' => $pageTitle,
            'user' => $user,
            'pageTitle' => 'Chi tiết giỏ hàng',
            'bodyClass' => 'woocommerce-cart woocommerce-page page',
        ];
        return view('guest.cart.index', $data);
    }

    public function add($id) {
        $product = Product::find($id);
        if (!$product) 
            return redirect()->to('/');

        // Kiểm tra số lượng sản phẩm
        if ($product->number < 1) {
            \Session::flash('toastr', [
                'type' => 'error',
                'message' => 'Sản phẩm đã hết hàng!',
            ]);
            return redirect()->back();
        }

        // Thêm sản phẩm vào giỏ hàng
    	\Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
            'weight' => 0,
            'options' => [
                'price_entry' => $product->price_entry,
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

    public function updateAjax(Request $request, $id) {
        if ($request->ajax()) {
            // Lấy tham số truyền qua ajax
            $qty = $request->qty ?? 2;
            $idProduct = $request->idProduct;
            $product = Product::find($idProduct);

            if (!$product) {
                \Session::flash('toastr', [
                    'type' => 'warning',
                    'message' => 'Sản phẩm không tồn tại!',
                ]);
                return null;
            }

            if ($qty < 0) {
                \Session::flash('toastr', [
                    'type' => 'warning',
                    'message' => 'Số lượng tối thiểu là 1!',
                ]);
                return null;
            }

            if ($qty > 5) {
                \Session::flash('toastr', [
                    'type' => 'warning',
                    'message' => 'Số lượng tối đa là 5!',
                ]);
                return null;
            }

            if ($product->number < $qty) {
                \Session::flash('toastr', [
                    'type' => 'warning',
                    'message' => 'Số lượng sản phẩm không đủ!',
                ]);
                return null;
            }

            \Cart::update($id, $qty);
            \Session::flash('toastr', [
                'type' => 'success',
                'message' => 'Cập nhật thành công!',
            ]);
            return null;
        }
    }

    public function delete($rowId) {
        \Session::flash('toastr', [
            'type' => 'info',
            'message' => 'Đã xóa sản phẩm khỏi giỏ hàng',
        ]);
    	\Cart::remove($rowId);
        return redirect()->back();
    }

    public function checkout() {
        $cartItems = \Cart::content();
        $cities = Location::where('type', 1)->get();
        $user = User::find(\Session::get('userId'));
        $data = [
            'cartItems' => $cartItems,
            'cities' => $cities,
            'user' => $user,
            'pageTitle' => 'Thanh toán',
            'bodyClass' => 'page woocommerce-checkout',
        ];
        return view('guest.cart.checkout', $data);
    }

    public function getPaymentForm() {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

        $vnp_TmnCode = "BOLKPQ6I"; //Mã website tại VNPAY 
        $vnp_HashSecret = "YKJBDPKOAIOIAFWXGVFKXYSGDOUQQVHN"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8080/myshop/";

        $vnp_TxnRef = $_POST['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $_POST['order_desc'];
        $vnp_OrderType = $_POST['order_type'];
        $vnp_Amount = $_POST['amount'] * 100;
        $vnp_Locale = $_POST['language'];
        $vnp_BankCode = $_POST['bank_code'];
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url
        );
        
        return redirect()->to($returnData['data']);
    }

	public function pay(CartRequest $request) {
        $data = $request->except('_token');
        $totalMoney = str_replace(',','', \Cart::subtotal(0));
        if ($data['payment_method'] == 1) {
            if (\Session::get('userId')) {
                $data['user_id'] = \Session::get('userId');
                $user = User::find(\Session::get('userId'));
                //---- Dùng để lưu thông tin tài khoản nếu TK chưa có thông tin địa chỉ -----------
                if (!isset($user->city)) {
                    \DB::table('users')
                        ->where('id', $data['user_id'])
                        ->update([
                            'phone' => $data['phone'],
                            'street_address' => $data['street_address'],
                            'city' => $data['city'],
                            'district' => $data['district'],
                            'ward' => $data['ward'],
                        ]);
                } 
            }  
            $data['total_money'] = str_replace(',','', \Cart::subtotal(0));
            $data['created_at'] = Carbon::now();
            $transactionId = Transaction::insertGetId($data);
            if ($transactionId) {
                $cartItems = \Cart::content();
                $transaction = Transaction::find($transactionId);
                // Gửi email đơn hàng mới đặt cho khách
                Mail::to($request->email)->send(new Invoice($transaction, $cartItems));
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
                    // Giảm tạm thời số lượng tồn kho của sản phẩm
                    // -- Nếu Hủy đơn -> Tăng lại
                    // -- Nếu xóa sản phẩm trong chi tiết đơn hàng -> Tăng lại
                    Product::where('id', $item->id)->decrement('number', $item->qty);
                }
            }
            \Session::flash('toastr', [
                'type' => 'success',
                'message' => 'Tạo đơn hàng thành công',
            ]);
            \Cart::destroy();
            return redirect()->to('/');
        } elseif ($data['payment_method'] == 2) {
            return view('guest.cart.payment');
        } else {
            return redirect()->to('/');
        }
    }

    // Load Tỉnh/Thành phố, Quận/Huyện,...
    public function getLocation(Request $request) {
        $parentId = $request->parent;
        if ($parentId)
            $locations = Location::where('parent_id', $parentId)->get();
        return response(['data' => $locations]);
    }
}
