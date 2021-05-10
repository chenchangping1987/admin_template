<?php

namespace app\admin\controller;

use app\common\controller\BasicApi;
use tauthz\facade\Enforcer;

class Permissions extends BasicApi
{
    public function add()
    {
        // adds permissions to a user
        Enforcer::addPermissionForUser('eve', 'articles', 'read');
        // adds a role for a user.
        Enforcer::addRoleForUser('eve', 'writer');
        // adds permissions to a rule
        Enforcer::addPolicy('writer', 'articles','edit');
    }
}