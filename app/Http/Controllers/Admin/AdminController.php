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
	
	public static function getDaysInMonth() {
		$arrDay = [];
		$month = date('m');
		$year = date('Y');

		// Lấy các ngày trong tháng $month
		for ($day = 1; $day <= 31; $day++) { 
			$time = mktime(12, 0, 0, $month, $day, $year);
			if (date('m', $time) == $month) {
				$arrDay[] = date('d-m-Y', $time);
			}
		}

		return $arrDay;
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

		// Lấy ds các ngày trong tháng
		$listDay = $this->getDaysInMonth();

		// Doanh thu theo tháng (Trạng thái đơn hàng 'Đã giao' <=> 3)
		$revenueInMonth = Transaction::where('status', 3)
			->whereMonth('created_at', date('m'))
			->select(\DB::raw('SUM(total_money) as totalMoney'), \DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as day'))
			->groupBy('day')
			->get()->toArray();
		// Gắn doanh thu là 0 cho những ngày không có
		$arrRevenueInMonth = [];
		foreach ($listDay as $day) {
			$total = 0;
			foreach ($revenueInMonth as $key => $revenue) {
				if ($revenue['day'] == $day) {
					$total = $revenue['totalMoney'];
					break;
				}
			}
			$arrRevenueInMonth[] = (int)$total;
		}

		// Chi phí theo tháng (Trạng thái đơn hàng 'Đã giao' <=> 3)
		$costInMonth = Transaction::where('status', 3)
			->whereMonth('created_at', date('m'))
			->select(\DB::raw('SUM(total_cost) as totalCost'), \DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as day'))
			->groupBy('day')
			->get()->toArray();
		// Gắn Chi phí là 0 cho những ngày không có
		$arrCostInMonth = [];
		foreach ($listDay as $day) {
			$total = 0;
			foreach ($costInMonth as $key => $cost) {
				if ($cost['day'] == $day) {
					$total = $cost['totalCost'];
					break;
				}
			}
			$arrCostInMonth[] = (int)$total;
		}

		$arrProfitInMonth = [];
		foreach ($listDay as $key => $day) {
			$total = $arrRevenueInMonth[$key] - $arrCostInMonth[$key];
			$arrProfitInMonth[] = (int)$total;
		}

		$data = [
    		'totalTransaction' => $totalTransaction,
    		'latestTransactions' => $latestTransactions,
    		'totalUser' => $totalUser,
    		'topViewedProducts' => $topViewedProducts,
    		'listDay' => json_encode($listDay),
    		'arrRevenueInMonth' => json_encode($arrRevenueInMonth),
    		'arrCostInMonth' => json_encode($arrCostInMonth),
    		'arrProfitInMonth' => json_encode($arrProfitInMonth),
    	];
    	return view('admin.index', $data);
    }
}
