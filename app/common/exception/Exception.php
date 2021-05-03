<?php


namespace app\common\exception;


use app\common\model\Log;
use think\db\exception\DbException;
use think\exception\Handle;
use think\exception\HttpResponseException;
use think\exception\ValidateException;
use think\Response;
use Throwable;

class Exception extends Handle
{
    /**
     * 捕捉数据库异常
     * @param \think\Request $request
     * @param Throwable $e
     * @return Response
     */
    public function render($request, Throwable $e): Response
    {
        // 数据库异常
        if ($e instanceof DbException) {
            // 将数据库异常写入日志中
            Log::create(['info'=>$e->getMessage(),'ip'=>request()->ip()]);
            $result = [
                'code' => 0,
                'message' => '数据异常',//$e->getMessage(),
                'data' => new \stdClass(),
                'time' => time()
            ];
            throw new HttpResponseException(Response::create($result, 'json', 200));
        }

        // 验证信息异常
        if ( $e instanceof ValidateException){
            $result = [
                'code' => 0,
                'message' => $e->getMessage(),
                'data' => new \stdClass(),
                'time' => time()
            ];
            throw new HttpResponseException(Response::create($result, 'json', 200));
        }

        // 其他错误交给系统处理
        return parent::render($request, $e);
    }
}