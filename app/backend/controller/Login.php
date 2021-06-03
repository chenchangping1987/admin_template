<?php


namespace app\backend\controller;


use app\BaseController;
use app\common\model\Users as UsersModel;
use think\facade\Cache;
use think\facade\Session;
use think\Request;

class Login extends BaseController
{
    /**
     * 登陆
     * @return \think\response\View
     */
    public function index(Request $request)
    {
        if ( $request->isPost() ){
            $result = $this->validate($request->post(), \app\validate\backend\Login::class);

            if ( $result !== true ){
                success($result->getError());
            }

            $this->action($request);
        }
        return view();
    }

    /**
     * 后台管理员登陆数据处理
     * @param Request $request
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function action(Request $request)
    {
        // 数据处理
        $username = $request->post('username');
        $password = $request->post('password');
        $prefix = config('backend.password_prefix');

        $users = UsersModel::where('username', $username)->find();
        // 验证用户信息
        if ( !$users ){
            error('用户名或者密码错误');
        }

        // 验证密码
        if ( !password_verify($prefix . $password, $users->password) ){
            error('用户名或者密码错误');
        }

        session('admin_users', $users);

        success('登陆成功');
    }
}