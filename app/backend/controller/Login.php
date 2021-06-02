<?php


namespace app\backend\controller;


use app\BaseController;
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
            $this->validate($request->post(), \app\validate\backend\Login::class);

            // 数据处理

            return false;
        }
        return view();
    }

    public function action()
    {

    }
}