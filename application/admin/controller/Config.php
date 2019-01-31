<?php
/**
 * Created by PhpStorm.
 * User: @QZH
 * Date: 2019/1/22
 * Time: 15:45
 */

namespace app\admin\controller;


use app\admin\model\Power;
use app\admin\validata\AddUrl;

class Config extends Base
{
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 添加url
     * @return mixed|\think\response\Json
     */
    public function addurl()
    {
        if($this->request->isPost()){
            $data = $this->request->post();
            $validate  = new AddUrl();
            $validate->check($data);
            if(!empty($validate->getError())){
                return json(['status'=>'500','msg'=>$validate->getError()]);
            }
             $insert_data = [];
             $insert_data['power_name'] = $data['power_name'];
             $insert_data['url'] = $data['power_url'];
             $insert_data['sort'] = $data['sort'];
             $insert_data['is_show'] = $data['is_show'];
             $insert_data['pid'] = $data['pid'];
             $insert_data['created_time'] = date("Y-m-d H:i:s");
             $result = Power::add($insert_data);
             if(!$result){
                 return json(['status'=>'500','msg'=>'添加失败，请稍后再试']);
             }
             return json(['status'=>'200','msg'=>'success']);

        }else{
            $powerList = Power::getByConditionGetRow(['is_tmp'=>1]);
            $this->assign('powerList',$powerList);
            return $this->fetch();
        }

    }

    public function urlList()
    {
        $list = Power::getByConditionGetRow();
        $this->assign('list',$list);
        return $this->fetch();
    }
}