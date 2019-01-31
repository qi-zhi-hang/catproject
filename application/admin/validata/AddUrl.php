<?php

/**
 * Created by PhpStorm.
 * User: @QZH
 * Date: 2019/1/23
 * Time: 19:24
 */
namespace app\admin\validata;
use think\Db;
use think\Validate;

class AddUrl extends Validate
{
    protected $rule = [
        'power_name'=>'require',
        'power_url' =>'require|checkUrl',
        'sort'      =>'require|number',
        'is_temp'   =>'number',
        'is_show'   =>'number'
    ];
    protected $message = [
       /* 'power_name.require'=>'标题不能为空',
        'power_url.require' =>'链接不能为空',
        'power_url.alpha' =>'链接必须是字符',
        'sort.require'    =>'排序必须是数字',
        'sort.number'     =>'排序值必须是数字',
        'is_temp.number'  =>'是否是导航规则错误',
        'is_show.number'  =>'是否展示规则错误',*/

        'power_name.require'=>'标题不能为空',
        'power_url.require' =>'链接不能为空',
        'power_url.checkUrl'=>'url已经存在',
        //'power_url.alpha' =>'link must alpha',
        'sort.require'    =>'排序必须不能为空',
        'sort.number'     =>'排序必须是数字',
        'is_temp.number'  =>'是否是导航规则错误',
        'is_show.number'  =>'是否展示规则错误',

    ];

    /**
     * 验证用户提交的url是否存在
     * @param $value
     * @param $rule
     * @param array $data
     * @return bool
     */
    protected function checkUrl($value,$rule,$data=[])
    {
        $url = Db::name('power')->where(['url'=>$value])->find();
        if($url){
            return false;
        }else{
            return true;
        }
    }
}