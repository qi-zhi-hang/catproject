<?php

/**
 * Created by PhpStorm.
 * User: @QZH
 * Date: 2018/12/24
 * Time: 18:36
 */
namespace app\admin\controller;
class Index extends Base
{
    public function index()
    {
        return $this->fetch();
    }
    public function main()
    {
        return $this->fetch();
    }
}