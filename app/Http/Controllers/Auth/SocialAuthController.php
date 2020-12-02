<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Log;
use App\Models\Socialite;

class SocialAuthController extends Controller {
    public function redirect($social) {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social) {
        $user = SocialAccountService::createOrGetUser(Socialite::driver($social)->user(), $social);
        auth()->login($user);

        return redirect()->to('/home');
    }
}
