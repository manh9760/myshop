<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Product;

session_start();

class AdminController extends Controller {
	protected function isLogined() {
		$isLogined = \Session::get('adminId');
		if ($isLogined) {
            return true;
        } else {
			return false;
		}
	}
	
	public function home() {
		// Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');

		// Đơn hàng
		$totalTransaction = \DB::table('transactions')->select('id')->count();
		$latestTransactions = Transaction::orderByDesc('id')->limit(6)->get();

		// Tài khoản
		$totalUser = \DB::table('users')->select('id')->count();

		// Sản phẩm
		$topViewedProducts = Product::orderByDesc('view')->limit(5)->get();

		$data = [
    		'totalTransaction' => $totalTransaction,
    		'latestTransactions' => $latestTransactions,
    		'totalUser' => $totalUser,
    		'topViewedProducts' => $topViewedProducts,
    	];
    	return view('admin.index', $data);
    }
}
