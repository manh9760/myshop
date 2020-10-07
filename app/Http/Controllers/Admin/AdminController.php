<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

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
        if ($this->isLogined()) {
            return view('admin.index');
        } else {
			return redirect()->to('/admin/login');
		}
    }
}
