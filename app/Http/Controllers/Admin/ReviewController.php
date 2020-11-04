<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ReviewController extends AdminController {
    public function index(Request $request) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');

        $reviews = Review::whereRaw(1);

        // Các điều kiện lọc
        if ($status = $request->status) {
            switch ($status) {
                case 1:
                    $reviews->where('status', 1);
                    break;
                case 2:
                    $reviews->where('status', 0);
                    break;
            }   
        }
        if ($star = $request->star) {
            switch ($star) {
                case 1:
                    $reviews->where('star', 1);
                    break;
                case 2:
                    $reviews->where('star', 2);
                    break;
                case 3:
                    $reviews->where('star', 3);
                    break;
                case 4:
                    $reviews->where('star', 4);
                    break;
                case 5:
                    $reviews->where('star', 5);
                    break;
            }   
        }
        
        $reviews = $reviews->orderByDesc('id')->paginate(10);

    	$data = [
    		'reviews' => $reviews,
    	];
    	return view('admin.review.index', $data);
    }

    public function active($id) {
        $review = Review::find($id);
        $review->status = !$review->status;
        $review->save();
        \Alert::success('Thành công', 'Cập nhật trạng thái đánh giá');
        return redirect()->back();
    }

    public function delete($id) {
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
        \Alert::info('Thông báo', 'Đã xóa đánh giá');
        return redirect()->back();
    }
}
