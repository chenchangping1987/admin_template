<?php

namespace app\admin\controller;

use tauthz\facade\Enforcer;
use app\common\controller\BasicApi;

class Permissions extends BasicApi
{
    public function add()
    {
        // 当前用户添加权限
        // // adds permissions to a user
        // Enforcer::addPermissionForUser('eve', 'articles', 'read');
        // // adds a role for a user.
        // Enforcer::addRoleForUser('eve', 'writer');
        // // adds permissions to a rule
        // Enforcer::addPolicy('writer', 'articles','edit');
    }

}