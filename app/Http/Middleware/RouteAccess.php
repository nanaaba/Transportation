<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class RouteAccess {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $permissions = $request->session()->get('permissions');

        // Get the current route.
        $route = $request->route();
// Get the current route actions.
        $actions = $route->getAction();

       
    }

}
