<?php


namespace app\admin\controller;


use app\admin\model\Roles;
use app\common\controller\BasicApi;

class Role extends BasicApi
{
    /**
     * 添加角色
     */
    public function roleAdd()
    {
        $this->checkValidate();

        if ( Roles::create($this->params) ){
            $this->success('添加成功');
        } else {
            $this->error('添加失败');
        }
    }

    /**
     * 编辑角色
     */
    public function roleEdit()
    {
        $this->checkValidate();

        if ( Roles::update($this->params) ){
            $this->success('更新成功');
        } else {
            $this->error('更新失败');
        }
    }

    /**
     * 验证
     */
    protected function checkValidate()
    {
        $this->validate($this->params, [
            'role_name' => 'require|unique:role,role_name',
            'desc' => 'require',
        ], [
            'role_name.require' => '角色名称不可以为空',
            'role_name.unique' => '角色名称已存在',
            'desc.require' => '请输入角色描述',
        ]);
    }
}