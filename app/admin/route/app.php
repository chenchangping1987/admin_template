<?php

use think\facade\Route;

// 登陆
Route::post('login', 'Login/index')->name('login');
// 菜单
Route::post('menu_add', 'Menu/menuAdd')->name('menu');