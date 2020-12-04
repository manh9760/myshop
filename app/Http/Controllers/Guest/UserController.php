<?php

namespace App\Http\Controllers\Guest;

use App\User;
use Carbon\Carbon;
use App\Models\Order;
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
        foreach ($transactions as $transaction) {
            $orders = Order::with('product:id,name')
                ->where('transaction_id', $transaction->id)
                ->get();
        }
        $data = [
            'user' => $user,
            'page' => 'orders',
            'transactions' => $transactions,
            'orders' => $orders,
            'bodyClass' => 'woocommerce-cart woocommerce-page page',
        ];
        return view('guest.user.order', $data);
    }

    public function getReviews($userId) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/dang-nhap');
        $user = User::find($userId);
        $data = [
            'user' => $user,
            'page' => 'reviews',
        ];
        return view('guest.user.review', $data);
    }
}
