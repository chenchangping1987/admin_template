<?php

use think\facade\Route;

// 登陆
Route::post('login', 'Login/index')->name('login');
// 菜单
Route::post('menu_add', 'Menu/menuAdd')->name('menu_add');

// 规则
Route::post('rule_add', 'Rule/ruleAdd')->name('rule_add');
Route::post('rule_edit', 'Rule/ruleEdit')->name('rule_edit');
Route::post('rule_del', 'Rule/ruleDelete')->name('rule_del');

// 角色
Route::post('role_add', 'Role/roleAdd')->name('role_add');
Route::post('role_edit', 'Role/roleEdit')->name('role_edit');
Route::post('role_del', 'Role/roleDelete')->name('role_del');

// 权限
Route::post('permissions_add', 'Permissions/add')->name('permissions_add');

// 测试路由
Route::post('test', 'Test/index')->name('test');