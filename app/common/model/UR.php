<?php


namespace app\common\model;


use think\Model;

class UR extends Model
{
    /**
     * 绑定数据表
     * @var string
     */
    protected $table = 'admin_users_role';

    /**
     * 绑定用户
     * @return \think\model\relation\HasMany
     */
    public function users()
    {
        return $this->hasOne(Users::class, 'id', 'user_id');
    }

    /**
     * 绑定角色
     * @return \think\model\relation\HasMany
     */
    public function roles()
    {
        return $this->hasOne(Roles::class, 'id', 'role_id');
    }
}