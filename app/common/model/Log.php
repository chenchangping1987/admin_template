<?php


namespace app\common\model;


use app\admin\model\Users;
use think\Model;

class Log extends Model
{
    /**
     * 日志信息
     * @var
     */
    private static $info;

    /**
     * 用户id
     * @var int
     */
    private static $user_id = 0;

    /**
     * 后台登陆
     * @param $users
     */
    public static function adminLogin(Users $users)
    {
        self::$info = $users->username . ' 登陆后台，登陆时间：' . date('Y-m-d H:i:s', time());
        self::$user_id = $users->id;

        self::createData();
    }

    /**
     * 退出登陆
     * @param $users
     */
    public static function adminLoginOut($users)
    {
        self::$info = $users->username . '退出登陆，退出时间：' . date('Y-m-d H:i:s', time());
        self::$user_id = $users->id;
        self::createData();
    }

    /**
     * 写入日志
     * @return Log|Model
     */
    public static function createData()
    {
        $data = ['info' => self::$info,'ip' => request()->ip(), 'user_id' => self::$user_id];
        return self::create($data);
    }
}