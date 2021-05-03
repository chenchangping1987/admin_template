<?php

use think\facade\Route;

Route::post('/', 'Index/index');

// Route::miss(function () {
//     return request()->host();
// });