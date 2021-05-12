<?php


namespace app\common\controller;


use app\BaseController;
use think\exception\HttpResponseException;
use think\facade\Cache;
use think\Response;
use think\response\Json;

class BasicApi extends BaseController
{
    /**
     * token信息
     * @var
     */
    public $token;

    /**
     * 用户信息
     * @var
     */
    public $users;

    /**
     * 参数
     * @var
     */
    public $params = [];

    /**
     * 初始化
     */
    public function initialize()
    {
        // parent::initialize();

        // 获取token信息
        $this->token = $_SERVER['HTTP_TOKEN']??null;

        // 获取用户信息
        if ( $this->token ){
            $this->users = Cache::get($this->token);
        }

        // 参数过滤
        foreach ($this->request->post() as $key=>$value){
            $this->params[$key] = $value;
        }
    }

    /**
     * 生成token
     * @param $users
     * @return string
     */
    protected function createToken($users)
    {
        // 将用户信息转成base64
        $users = base64_encode($users);

        // 返回md5信息
        return strtoupper(md5(uniqid(md5(substr(time(), -8))) . $users));
    }

    /**
     * 返回成功提示信息
     * @param string $message
     * @param array $data
     * @param int $code
     */
    public function success($message = '数据获取成功!', $data = [], $code = 1)
    {
        $this->result($code,$message, $data);
    }

    /**
     * 返回错误提示信息
     * @param string $message
     * @param int $code
     */
    public function error(string $message,int $code = 0)
    {
        $this->result($code, $message);
    }

    /**
     * 抛出JSON数据
     * @param $code
     * @param $message
     * @param $data
     */
    protected function result($code,$message,$data = []) :  Json
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