<?php

/**
 * Created by PhpStorm.
 * User: @QZH
 * Date: 2019/1/30
 * Time: 18:16
 */
namespace app\api\controller;
use app\api\base\Base;

class Index extends Base
{
    public function index()
    {
        $post_data = input();
        return json(['data'=>[888]]);
    }
}