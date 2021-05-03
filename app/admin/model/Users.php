<?php


namespace app\admin\model;


use think\Model;

class Users extends Model
{
    /**
     * 根据用户名称查询用户信息是否存在
     * @param $username
     * @return bool
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public static function checkUserName($username)
    {
        return self::where('username',$username)->find();
    }
}