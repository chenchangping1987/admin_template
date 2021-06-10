<?php


namespace app\backend\controller;


class Index extends Base
{
    protected $middleware = ['admin/login'];
    public function index()
    {
        return view();
    }
}