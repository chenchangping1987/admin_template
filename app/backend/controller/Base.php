<?php


namespace app\backend\controller;


use app\BaseController;

class Base extends BaseController
{
    protected $middleware = ['admin/login'];
    protected function initialize()
    {
        // 获取登陆信息

        // 获取权限

        // 获取菜单
    }
}