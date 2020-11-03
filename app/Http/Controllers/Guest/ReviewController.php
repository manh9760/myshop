<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use Carbon\Carbon;

class ReviewController extends GuestController {

	private function staticReview($productId, $star) {
		$product = Product::find($productId);
		$product->review_total++;
		$product->review_star += $star;
		$product->average_star = round($product->review_star / $product->review_total);
		$product->save();
	}

    public function add(Request $request) {
        $data = $request->except('_token');
        $data['created_at'] = Carbon::now();
        $id = Review::insertGetId($data);

        if ($id) {
        	$this->staticReview($request->product_id, $request->star);
        }
        \Session::flash('toastr', [
            'type' => 'success',
            'message' => 'Đã thêm đánh giá',
        ]);
        return redirect()->back();
    }
}
