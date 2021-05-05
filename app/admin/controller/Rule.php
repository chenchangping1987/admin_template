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
    public function ruleAdd()
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

    /**
     * 编辑规则
     */
    public function ruleEdit()
    {
        // 验证字段
        $this->checkValidate();
        // 数据id
        if ( !$this->params['id']??null ){
            $this->error('参数异常');
        }

        // 数据是否存在
        if (!Rules::find($this->params['id'])){
            $this->error('数据异常2');
        }

        // 更新数据
        if(Rules::update($this->params)){
            $this->success('更新成功');
        }

        $this->error('更新失败');
    }

    /**
     * 规则删除
     */
    public function ruleDelete()
    {
        if (!$this->params['id']??null){
            $this->error('数据异常');
        }

        if(Rules::where('id', $this->params['id'])->delete()){
            $this->success('删除成功');
        }

        $this->error('删除失败');
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
            'rule_path.require' => '规则路径必填',
        ]);
    }
}