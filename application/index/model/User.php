<?php

/**
 * Created by PhpStorm.
 * User: @QZH
 * Date: 2018/12/19
 * Time: 20:10
 */
namespace app\index\model;
use think\Model;

class User extends Model
{
    static function getInfo()
    {
       $redis = \Redis::class;
        return $redis;
    }
}