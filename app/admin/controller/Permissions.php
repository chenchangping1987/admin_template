<?php

namespace app\admin\controller;

use tauthz\facade\Enforcer;
use app\common\controller\BasicApi;

class Permissions extends BasicApi
{
    public function add()
    {
        /**
         * 1、角色表
         * 1.1添加角色
         * 1.2修改角色
         * 1.3删除角色  Enforcer::deleteRole( $role);  // 删除一个角色
         * 2、规则表
         * 2.1添加规则
         * 2.2修改规则
         * 2.3删除规则
         * 3、权限表
         * 3.1添加权限
         * 3.2修改权限
         * 3.3删除权限  Enforcer::deletePermission( $policy);  // 删除权限
         * 4、角色-用户
         * 4.1用户绑定角色    Enforcer::addRoleForUser( $username, $role) ; 为用户添加角色
         * 4.2用户解除角色    Enforcer::deleteRoleForUser( $username, $role) ; 删除用户的角色
         * 4.3用户解除所有角色  Enforcer::deleteRolesForUser( $username) ; 删除用户的所有角色
         * 4.4验证用户跟角色   Enforcer::hasRoleForUser( $username,  $role);  // 确定用户是否具有角色
         * 4.5查询用户拥有的角色 Enforcer::getRolesForUser( $username);  // 获取用户具有的角色
         * 5、角色-权限
         * 5.1角色绑定权限    Enforcer::addPermissionForUser( $username, $policy);  // 为用户或角色添加权限
         * 5.2角色解除权限    Enforcer::deletePermissionForUser( $username, $policy);  // 删除用户或角色的权限
         * 5.3角色解除所有权限  Enforcer::deletePermissionsForUser( $username);  // 删除用户或角色的权限
         * 5.4查看角色所有权限  Enforcer::getPermissionsForUser( $username);  // 获取用户或角色的权限
         */

        // $result = Enforcer::enforce( 'eve', 'articles', 'read') ;// static 权限检查
        // $result = Enforcer::addPolicy( '管理员登陆', '/admin/login', 'read') ;// static 当前策略添加授权规则

        // Enforcer::enforce( $subject, $object, $action);  // 权限检查
        // Enforcer::addPolicy( $subject, $object, $action);  // 当前策略添加授权规则
        // Enforcer::hasPolicy( $subject, $object, $action);  // 确定是否存在授权规则
        // Enforcer::removePolicy( $subject, $object, $action);  // 当前策略移除授权规则
        // Enforcer::getRolesForUser( $username);  // 获取用户具有的角色
        // Enforcer::getUsersForRole( $role);  // 获取具有角色的用户
        // Enforcer::hasRoleForUser( $username,  $role);  // 确定用户是否具有角色
        // Enforcer::addRoleForUser( $username,  $role);  // 为用户添加角色
        // Enforcer::deleteRoleForUser( $username,  $role);  // 删除用户的角色
        // Enforcer::deleteRolesForUser( $username);  // 删除用户的所有角色
        // Enforcer::deleteUser( $username);  // 删除一个用户
        // Enforcer::deleteRole( $role);  // 删除一个角色
        // Enforcer::deletePermission( $policy);  // 删除权限
        // Enforcer::addPermissionForUser( $username, $policy);  // 为用户或角色添加权限
        // Enforcer::deletePermissionForUser( $username, $policy);  // 删除用户或角色的权限
        // Enforcer::deletePermissionsForUser( $username);  // 删除用户或角色的权限
        // Enforcer::getPermissionsForUser( $username);  // 获取用户或角色的权限
        // Enforcer::hasPermissionForUser( $username, $policy);  // 确定用户是否具有权限
        // Enforcer::getImplicitRolesForUser( $username);  // 获取用户具有的隐式角色
        // Enforcer::getImplicitPermissionsForUser( $username);  // 获取用户具有的隐式角色

    }

}