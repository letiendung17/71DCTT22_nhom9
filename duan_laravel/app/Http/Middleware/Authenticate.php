<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

     //mặc định của laravel khi cố tình nhập đường dẫn vào dasboard khi chưa đăng nhập
    // protected function redirectTo($request)
    // {
    //     if (! $request->expectsJson()) {
    //         return route('login');
    //     }
    // }

    //còn đây là của tôi 
    protected function redirectTo($request)
{
    if (! $request->expectsJson()) {
        return route('admin');
    }
}
}
