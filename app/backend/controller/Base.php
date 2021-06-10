<?php


namespace app\backend\controller;


use app\BaseController;
use app\common\model\UR;
use app\common\model\Menu;
use think\facade\View;

class Base extends BaseController
{
    /**
     * 绑定中间件
     * @var string[]
     */
    protected $middleware = ['admin/login'];

    /**
     * 用户信息
     * @var
     */
    public $users;

    /**
     * 菜单信息
     * @var
     */
    public $menu;

    /**
     * 初始化
     */
    protected function initialize()
    {
        // 获取登陆信息
        $this->users = session('admin_users');

        if ( !$this->users ){
            return redirect('/backend/login');
        }

        // 获取权限
        if ( $this->users['username'] !== 'admin' ){
            // 获取角色信息
            $roles = UR::with(['roles'])->where('user_id', $this->users['id'])->select();
            // 获取菜单
        }
        $this->menu = Menu::order('sort desc,id desc')->select();

        // $this->assign('menu', $this->menu);
        View::assign('menu', $this->menu);
    }
}