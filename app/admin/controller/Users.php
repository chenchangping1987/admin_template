<?php


namespace app\admin\controller;


use app\common\controller\BasicApi;
use app\admin\model\Users as UsersModel;

class Users extends BasicApi
{
    /**
     * 添加管理员
     */
    public function add()
    {
        /**
         * 1、用户名必填
         * 2、电话号码必填
         * 3、密码默认 123456
         */

        // TODO 验证权限
        // 验证管理员信息
        $this->usersValidate();
        // 管理员默认密码
        $this->params['password'] = password_hash(env('adminusers.prefix') . '123456', PASSWORD_DEFAULT);

        // 写入数据库
        if ( UsersModel::create($this->params) ){
            $this->success('数据更新成功');
        } else {
            $this->error('数据更新失败');
        }

    }

    /**
     * 编辑管理员
     */
    public function edit()
    {
        // TODO 验证权限
        // 验证用户ID
        if ( !isset($this->params['id']) ){
            $this->error('数据异常');
        }
        // 验证管理员信息
        $this->usersValidate();
        // 写入数据库
        if ( UsersModel::update($this->params) ){
            $this->success('数据更新成功');
        } else {
            $this->error('数据更新失败');
        }
    }

    /**
     * 管理员信息验证
     */
    public function usersValidate()
    {
        // 验证管理员信息
        $this->validate($this->params, [
            'username' => 'require|min:6|unique:users,username',
            'password' => 'min:6|max:15',
            'mobile' => 'require|mobile|unique:users,mobile',
        ],[
            'username.require' => '管理员名称不正确',
            'username.unique' => '管理员名称重复',
            'username.min' => '管理员名称不得少于 6 个字符串',
            'password.min' => '管理员密码不得少于 6 个字符串',
            'password.max' => '管理员密码不得超过 15 个字符串',
            'mobile.require' => '管理员手机号码不能为空',
            'mobile.unique' => '手机号码已存在',
        ]);
    }
}