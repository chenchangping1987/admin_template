<?php


namespace app\common\model;


use think\Model;

class RP extends Model
{
    /**
     * 绑定数据表
     * @var string
     */
    protected $table = 'role_permissions';

    /**
     * 绑定角色
     * @return \think\model\relation\HasMany
     */
    public function roles()
    {
        return $this->hasMany(Roles::class, 'id', 'role_id');
    }

    /**
     * 绑定规则
     * @return \think\model\relation\HasMany
     */
    public function permissions()
    {
        return $this->hasMany(Permissions::class, 'id', 'permissions_id');
    }
}