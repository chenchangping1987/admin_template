<?php
// 应用公共文件
use think\exception\HttpResponseException;
use think\Response;

if ( !function_exists('success') ) {
    function success($msg, $data=[], $code = 1)
    {
        result($code,$msg, $data);
    }
}

if ( !function_exists('error') ) {
    function error($msg, $code = 0)
    {
        result($code, $msg);
    }
}

if ( !function_exists('result') ){
    function result($code,$message,$data = [])
    {
        if ( empty($data) ){
            $data = new \stdClass();
        }

        $result = [
            'code' => $code,
            'message' => $message,
            'data' => $data,
            'time' => time()
        ];

        throw new HttpResponseException(Response::create($result, 'json', 200));
    }
}