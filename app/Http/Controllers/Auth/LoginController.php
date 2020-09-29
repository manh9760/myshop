<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Guest\LoginRequest;
use Illuminate\Validation\Validator;
use App\Models\Category;
use Illuminate\Http\Request;
use View;

class LoginController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $categories = Category::all();
        View::share('categories', $categories);
    }

    public function getLoginForm() {
        return view('guest.auth.login');
    }

    public function login(Request $request) {
        $data = $request->except('_token');
        $result = \DB::table('users')
            ->where('email', $data['email']) 
            ->where('password', md5($data['password']))
            ->first();
        if ($result) {
            return redirect()->intended('/');
        }
        return redirect()->back();
    }

    public function logout() {
        Auth::logout();
        return redirect()->to('/');
    }
}
