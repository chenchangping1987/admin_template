<?php


namespace app\backend\middleware;


use think\Request;

class Login
{
    public function handle(Request $request, \Closure $next)
    {
        $users = session('admin_users');
        if ( !$users ){
            return redirect('/backend/login');
        }

        return $next($request);
    }
}