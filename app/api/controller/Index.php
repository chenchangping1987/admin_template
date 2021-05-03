<?php


namespace app\api\controller;


use app\api\model\Users;
use app\BasicApi;

class Index extends BasicApi
{
    public function index()
    {
        $data = [
            'username' => 'admin',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
        ];
        Users::create($data);
    }
}