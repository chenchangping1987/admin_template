<?php


/**
 * 设置配置
 * @param string $key
 * @param string $value
 * @return bool
 */
function config_set(string $key,string $value){
    return \app\common\model\Config::create([$key=>$value])?true:false;
}

/**
 * 获取配置
 * @param string $key
 * @return array
 */
function config_get(string $key){
    return \app\common\model\Config::where('key', $key)->column('value');
}