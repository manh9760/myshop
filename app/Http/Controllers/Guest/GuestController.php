<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\Product;

session_start();

class GuestController extends Controller {
	public function __construct() {
		$categories = Category::all();
		\View::share('categories', $categories);
	}

	protected function isLogined() {
		$isLogined = \Session::get('userId');
		if ($isLogined) {
            return true;
        } else {
			return false;
		}
	}
}
