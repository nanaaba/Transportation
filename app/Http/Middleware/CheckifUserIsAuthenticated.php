<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckifUserIsAuthenticated {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        //    echo 'eee';

        if ($this->checkifuserisauthentcated()) {
            return $next($request);
        }
//
        return redirect('/');
    }

    public function checkifuserisauthentcated() {
        if (Session::has('userid')) {
            return true;
        } else {
            return false;
        }
    }

}
