<?php
declare (strict_types = 1);

namespace app\middleware;

class Login
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next, $users)
    {
        //验证用户信息为空跳转登陆
        if($users){
            return ['code' => 1, 'message' => $users];
            return redirect('admin/login');
        }
        return $users;
        return $next($request);
    }
}
