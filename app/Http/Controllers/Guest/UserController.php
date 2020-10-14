<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller {
    
    public function getInfo() {
    	return view('guest.user.info');
    }
}
