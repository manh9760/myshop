<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\ShippingFeeRequest;
use App\Models\Location;
use App\Models\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ShippingFeeController extends AdminController {
    public function index(Request $request) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');

        $shipping_fees = Location::where('type', 1);

        // Các điều kiện lọc
        if ($city = $request->city) {
            $shipping_fees->where('name', 'like', '%'.$city.'%');
        }
        if ($fee = $request->fee) {
            $shipping_fees->where('shipping_fee', 'like', '%'.$fee.'%');
        }
        
        $shipping_fees = $shipping_fees->paginate(20);

    	$data = [
    		'shipping_fees' => $shipping_fees,
            'query' => $request->query(),
    	];
    	return view('admin.shipping_fee.index', $data);
    }

    public function update($id) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        $shipping_fee = Location::find($id);
        return view('admin.shipping_fee.update', compact('shipping_fee'));
    }

    public function updated(ShippingFeeRequest $request, $id) {
        $shipping_fee = Location::find($id);
        $data = $request->except('_token');
        $data['updated_at'] = Carbon::now();
        $shipping_fee->update($data);
        \Alert::success('Thành công', 'Cập nhật Phí vận chuyển');
        return redirect()->to('/admin/shipping_fee');
    }
}
