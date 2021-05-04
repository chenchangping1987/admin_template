<?php


namespace app\admin\model;


use think\Model;

class Rules extends Model
{
    /**
     * 绑定数据表
     * @var string
     */
    protected $table = 'admin_rule';

    /**
     * 根据名称查询数据
     * @param $ruleName
     * @return array|Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public static function getRuleName($ruleName)
    {
        return self::where('rule_name', $ruleName)->find();
    }
}