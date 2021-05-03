<?php


namespace app\admin\controller;


use app\admin\model\Users;
use app\admin\service\LoginService;
use app\common\controller\BasicApi;
use app\common\model\Log;
use think\facade\Cache;

class Login extends BasicApi
{
    /**
     * 用户登陆
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function index()
    {
        // 验证
        $this->validate($this->params, [
            'username' => 'require',
            'password' => 'require',
        ], [
            'username.require' => '用户名不可以为空',
            'password.require' => '密码不可以为空',
        ]);

        // 验证用户名是否存在
        if (!$users = Users::checkUserName($this->params['username'])){
            $this->error('用户名不存在');
        }

        // 验证用户密码是否正确
        if ( !password_verify($this->params['password'], $users->password) ){
            $this->error('密码不正确');
        }

        // 生成token
        $token = $this->createToken($users);

        // 缓存用户信息
        Cache::set($token, $users);

        // 写入登陆日志
        Log::adminLogin($users);

        return $this->success('登陆成功', ['token' => $token]);
    }
}