<?php


namespace app\admin\controller;


use app\admin\model\Rules;
use app\common\controller\BasicApi;

class Rule extends BasicApi
{
    /**
     * 添加规则
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function rule_add()
    {
        // 验证字段
        $this->checkValidate();
        // 验证是否重复
        if( Rules::getRuleName($this->params['rule_name']) ){
            $this->error('规则名称已经存在');
        }

        if(Rules::create($this->params)){
            $this->success('添加成功');
        } else {
            $this->error('添加失败');
        }
    }

    public function rule_edit()
    {
        // 验证字段
        $this->checkValidate();
        if ( !$this->params['id'] ){
            $this->error('参数异常');
        }
    }

    /**
     * 验证字段
     */
    public function checkValidate()
    {
        // 添加权限
        $this->validate($this->params, [
            'rule_name' => 'require',
            'rule_path' => 'require',
        ],[
            'rule_name.require' => '规则名称必填',
            'rule_path.require' => '规则名称必填',
        ]);
    }
}