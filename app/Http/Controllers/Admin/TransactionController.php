<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Location;
use App\Models\Order;

class TransactionController extends AdminController {
    public function index() {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
    	$transactions = Transaction::orderByDesc('id')->paginate(10);
    	$cities = Location::where('type', 1)->get();
    	$districts = Location::where('type', 2)->get();
    	$wards = Location::where('type', 3)->get();
    	$data = [
    		'transactions' => $transactions,
    		'cities' => $cities,
    		'districts' => $districts,
    		'wards' => $wards,
    	];
    	return view('admin.transaction.index', $data);
    }

    public function getTransactionDetail(Request $request, $id) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
        if($request->ajax()){
            $orders = Order::with('product:id,name,slug,avatar')->where('transaction_id', $id)->get();
            $html = view("admin._components.order_detail", compact('orders'))->render();    
            return response([
                'html' => $html,
            ]);
        }
    }

    public function delete($id) {
        $transaction = Transaction::find($id);
        if ($transaction) {
            $transaction->delete();
            Order::where('transaction_id', $id)->delete();
        }
        \Alert::info('Thông báo', 'Đã xóa đơn hàng');
        return redirect()->back();
    }

    public function deleteOrder(Request $request, $id) {
        if($request->ajax()){
            $order = Order::find($id);
            if ($order) {
                $money = $order->quantity * $order->product_price;
                Transaction::where('id', $order->transaction_id)->decrement('total_price', $money);
                $order->delete();
            }
            
            return response([
                'code' => 200,
            ]);
        }
    }
}
