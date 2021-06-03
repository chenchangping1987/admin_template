<?php


namespace app\backend\middleware;


use think\facade\Cache;
use think\Request;

class Login
{
    public function handle(Request $request, \Closure $next)
    {
        // $users = Cache::get('admin_users');
        // if ( !$users ){
        //     return redirect('/backend/login');
        // }

        return $next($request);
    }
}