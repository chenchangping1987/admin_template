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