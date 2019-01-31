<?php
/**
 * Created by PhpStorm.
 * User: @QZH
 * Date: 2019/1/24
 * Time: 17:57
 */

namespace app\admin\model;


use think\Db;
use think\Model;

class Power extends Model
{
    protected $name = 'power';

    /**
     * 根据给出的条件查出来多条数据
     * @param array $condition
     * @return array|\PDOStatement|string|\think\Collection
     */
    public static function getByConditionGetRow($condition= [])
    {

        return Db::name('power')->where($condition)->select();
    }

    /**
     * 添加一条数据
     * @param array $data
     * @return int|string
     */
    public static function add($data=[])
    {
        return Db::name('power')->insert($data);
    }

    /**
     * 获取单条数据的value值
     * @param array $condition
     * @param string $filed
     * @return mixed
     */
    public static function getOneValue($condition=[],$filed="*")
    {
        return Db::name('power')->where($condition)->value($filed);
    }

    public static function getOne()
    {

    }

    public function getIsTmpAttr($value)
    {
        $status = ['0'=>'否',1=>'是'];
        return $status[$value];
    }
}