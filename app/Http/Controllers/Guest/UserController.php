<?php

namespace App\Http\Controllers\Guest;

use App\User;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Review;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\Guest\UpdateInfoRequest;

class UserController extends GuestController {
    public function active($id) {
    	$user = User::find($id);
    	$user->active = 1;
    	$user->save();
        \Session::flash('toastr', [
            'type' => 'success',
            'message' => 'Kích hoạt tài khoản thành công!',
        ]);

        if ($this->isLogined()) {
            //  logout
            \Session::put('userId', null);
            \Session::put('userEmail', null);
            \Session::put('userFullName', null);
        }

        $pageTitle = 'Đăng nhập';
        $bodyClass = 'page woocommerce-checkout';
        $saleProducts = Product::where('active', 1)
            ->where('sale', '>', 0)
            ->orderByDesc('sale')
            ->limit(4)
            ->get();
        return redirect()->route('get.login');
    }

    public function getInfo($id) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/dang-nhap');
        $user = User::find($id);
        $data = [
            'user' => $user,
            'page' => 'info',
        ];
    	return view('guest.user.info', $data);
    }

    public function updateInfo(UpdateInfoRequest $request) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/dang-nhap');
        $data = $request->except('_token');
        $data['updated_at'] = Carbon::now();
        
        $user = User::find($data['user_id']);
        $user->full_name = $data['full_name'];
        $user->phone = $data['phone'];
        $user->save();
        // $user->update($data);
        \Session::flash('toastr', [
            'type' => 'success',
            'message' => 'Cập nhật thông tin tài khoản thành công!',
        ]);
        return redirect()->back();
    }

    public function getOrders($userId) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/dang-nhap');
        $user = User::find($userId);
        $transactions = Transaction::where('email', $user->email)->get();
        
        $data = [
            'user' => $user,
            'page' => 'orders',
            'transactions' => $transactions,
            'bodyClass' => 'woocommerce-cart woocommerce-page page',
        ];
        return view('guest.user.order', $data);
    }

    public function deleteOrder($id) {
        $transaction = Transaction::find($id);
        $transaction->status = 4;
        $orders = Order::with('product:id,name,number')->where('transaction_id', $id)->get();
        foreach ($orders as $item) {
            // Tăng số lượng tồn kho của mỗi sản phẩm trong đơn hàng bị hủy
            Product::where('id', $item->product_id)->increment('number', $item->quantity);
            $order->delete();
        }

        // $order = Order::find($id);
        // if ($order) {
        //     $money = $order->quantity * $order->product_price;
        //     Transaction::where('id', $order->transaction_id)->decrement('total_money', $money);
            
        //     // Tăng số lượng tồn kho của mỗi sản phẩm trong đơn hàng bị hủy
        //     Product::where('id', $order->product_id)->increment('number', $order->quantity);
        //     $order->delete();
        // }
        $transaction->save();
        \Session::flash('toastr', [
            'type' => 'success',
            'message' => 'Đã xóa đơn hàng thành công!',
        ]);
        return redirect()->back();
    }

    public function getReviews($userId) {
        $transactions = Transaction::where('user_id', $userId)
            ->where('status', 3)
            ->get();
        $orders = Null;
        foreach ($transactions as $transaction) {
            $orders = Order::with('product:id,name,slug,avatar')
                ->where('transaction_id', $transaction->id)
                ->get();
        }
        $data = [
            'page' => 'reviews',
            'transactions' => $transactions,
        ];
        return view('guest.user.review', $data);
    }

    public function deleteReview($id) {
        $review = Review::find($id);
        if ($review) {
            $product = Product::find($review->product_id);
            $product->review_total--;
            $product->review_star -= $review->star;
            if ($product->review_total == 0) {
                $product->average_star = 0;
            } else {
                $product->average_star = round($product->review_star / $product->review_total);
            }
            $product->save();
            $review->delete();
        }
        \Session::flash('toastr', [
            'type' => 'success',
            'message' => 'Đã xóa đánh giá thành công!',
        ]);
        return redirect()->back();
    }
}
