<?php

/**
 * Created by PhpStorm.
 * User: @QZH
 * Date: 2018/12/28
 * Time: 19:37
 */
namespace app\admin\model;
use think\Db;
use think\Model;

class Adminuser extends Model
{
    protected $pk = 'id';
    protected $table = 'tp_adminuser';
    protected $field = ['id','adminname','password','own_groupid','session_id'];
    private $noauth = ['index/index','index/main'];
    /**
     * 通过url和后台登陆id判断该用户是否有权限登陆
     * @param $urlid
     * @param $adminId group中的
     * @return bool
     */
    public  function checkAuthById($url,$adminId)
    {
        $id = Db::name('power')->where(['url'=>$url])->value('id');
        $groupInfo = Db::name('group')->where(['id'=>$adminId])->find();
        $groupIds = explode(',',$groupInfo['grop_power_ids']);
        if( in_array($url,$this->noauth) || in_array($id,$groupIds)){
            return true;
        }
        return false;

    }


}