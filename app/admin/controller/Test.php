<?php

namespace app\admin\controller;

use app\common\controller\BasicApi;
use app\admin\model\Users;

class Test extends BasicApi
{
    public function index()
    {
        dump(env('adminusers.prefix'));
        // $this->adminAdd();
    }

    public function adminAdd()
    {
        $data = [
            'username' => 'admin',
            'password' => password_hash(env('adminusers.prefix') . 'admin', PASSWORD_DEFAULT),
        ];

        $result = Users::create($data);

        dump($result);
    }
}