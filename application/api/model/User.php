<?php

/**
 * Created by PhpStorm.
 * User: @QZH
 * Date: 2019/2/17
 * Time: 21:35
 */
namespace app\api\model;
use think\Db;
use think\Model;

class User extends Model
{
    protected $name = 'user';
    public function getUserInfoById($id)
    {
        return Db::name('user')->where(['id'=>$id])->find();
    }

}