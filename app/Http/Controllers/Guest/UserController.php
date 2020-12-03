<?php

namespace App\Http\Controllers\Guest;

use App\User;
use Illuminate\Http\Request;

class UserController extends GuestController {
    public function active($id) {
    	$user = User::find($id);
    	$user->active = 1;
    	$user->save();
        \Session::flash('toastr', [
            'type' => 'success',
            'message' => 'Kích hoạt tài khoản thành công',
        ]);
    	return view('guest.user.info');
    }

    public function getInfo() {
    	return view('guest.user.info');
    }
}
