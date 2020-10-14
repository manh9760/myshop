<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Location;
use App\Models\Product;
use App\Models\Order;
use App\Exports\TransactionExport;
use Maatwebsite\Excel\Facades\Excel;
use App\User;

class TransactionController extends AdminController {
    public function index(Request $request) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
        $transactions = Transaction::whereRaw(1);

        // Các điều kiện lọc
        if ($full_name = $request->full_name) {
            $transactions->where('full_name', 'like', '%'.$full_name.'%');
        }
        if ($email = $request->email) {
            $transactions->where('email', 'like', '%'.$email.'%');
        }
        if ($user_type = $request->user_type) {
            switch ($user_type) {
                case 1:
                    $transactions->where('user_id', '<>', 0);
                    break;
                case 2:
                    $transactions->where('user_id', 0);
                    break;
            }   
        }
        if ($status = $request->status) {
            switch ($status) {
                case 1:
                    $transactions->where('status', 1);
                    break;
                case 2:
                    $transactions->where('status', 2);
                    break;
                case 3:
                    $transactions->where('status', 3);
                    break;
                case 4:
                    $transactions->where('status', 4);
                    break;
            }   
        }

    	$transactions = $transactions->orderByDesc('id')->paginate(10);
        
        // Xuất ra file Excel
        if ($request->export_excel) {
            return Excel::download(new TransactionExport($transactions), 'don-hang.xlsx');
        }

    	$cities = Location::where('type', 1)->get();
    	$districts = Location::where('type', 2)->get();
    	$wards = Location::where('type', 3)->get();
    	$data = [
    		'transactions' => $transactions,
            'query' => $request->query(),
    		'cities' => $cities,
    		'districts' => $districts,
    		'wards' => $wards,
    	];
    	return view('admin.transaction.index', $data);
    }

    // public function getTransactionDetail(Request $request, $id) {
    //     // Kiểm tra đăng nhập
    //     if (!$this->isLogined())
    //         return redirect()->to('/admin/login');
        
    //     if($request->ajax()){
    //         $orders = Order::with('product:id,name,slug,avatar')->where('transaction_id', $id)->get();
    //         $html = view("admin._components.order_detail", compact('orders'))->render();    
    //         return response([
    //             'html' => $html,
    //         ]);
    //     }
    // }

    public function getTransactionDetail($id) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');

        $orders = Order::with('product:id,name,slug,avatar')->where('transaction_id', $id)->get();
        $transaction = Transaction::find($id);
        $data = [
            'transaction' => $transaction,
            'orders' => $orders,
        ];
        return view('admin.transaction.detail', $data);    
    }

    public function printTransaction($id) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');

        $orders = Order::with('product:id,name,slug,avatar')->where('transaction_id', $id)->get();
        $transaction = Transaction::find($id);
        $data = [
            'transaction' => $transaction,
            'orders' => $orders,
        ];
        return view('admin.transaction.print', $data);    
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

    public function deleteOrder($id) {
        $order = Order::find($id);
        if ($order) {
            $money = $order->quantity * $order->product_price;
            Transaction::where('id', $order->transaction_id)->decrement('total_money', $money);
            
            // Tăng số lượng tồn kho của mỗi sản phẩm trong đơn hàng bị hủy
            Product::where('id', $order->product_id)->increment('number', $order->quantity);
            $order->delete();
        }
        \Alert::info('Thông báo', 'Đã xóa sản phẩm khỏi đơn hàng');
        return redirect()->back();
    }

    public function updateOrderStatus($status, $id) {
        $transaction = Transaction::find($id);
        if ($transaction) {
            switch ($status) {
                case 'processing':
                    $transaction->status = 2;
                    break;
                case 'complete':
                    $transaction->status = 3;
                    break;
                case 'canceled':
                    $transaction->status = 4;
                    $orders = Order::with('product:id,name,number,avatar')->where('transaction_id', $id)->get();
                    foreach ($orders as $item) {
                        // Tăng số lượng tồn kho của mỗi sản phẩm trong đơn hàng bị hủy
                        Product::where('id', $item->product_id)->increment('number', $item->quantity);
                    }
                    break;
                default:
                    break;
            }
            $transaction->save();
        }

        return redirect()->back();
    }
}
