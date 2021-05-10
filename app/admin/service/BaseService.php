<?php

namespace app\admin\service;

class BaseService
{
    
    public static function instance()
    {
        return new self();
    }

}