<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        // $home = auth()->user()->is_admin ? '/admin' : '/dashboard';
        if ($request->wantsJson()) {
            return response()->json(['two_factor' => false]);
        } else {
            $login_redirect_url = session('login_redirect_url');
            if(!empty($login_redirect_url)){
                session(['login_redirect_url' => null]);
                return redirect()->intended($login_redirect_url);
            } else {
                return redirect()->intended(config('fortify.home'));
            }
        }
    }
}
