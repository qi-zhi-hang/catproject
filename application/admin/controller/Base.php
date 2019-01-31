<?php

/**
 * Created by PhpStorm.
 * User: @QZH
 * Date: 2018/12/24
 * Time: 18:36
 */
namespace app\admin\controller;
use app\admin\model\Adminuser;
use think\App;
use think\Controller;
use think\Db;
use think\facade\Session;
use think\Request;

class Base extends Controller
{
    private $nologin = [];
    private $noauth = [];
    public function __construct(App $app)
    {
        parent::__construct($app);
        $this->checklogin();
        $this->getTemp();
        //检查是否有权限访问//
        $this->checkAuth();

    }
    private function getTemp()
    {
        $temp = Db::name('power')->select();
        //halt($temp);
        return $this->assign('temp',$temp);
    }

    /**
     * 判断后台管理员是否登陆
     */
    private function checklogin()
    {
        $admininfo = json_decode(Session::get('admininfo'),true);
        if(empty($admininfo)){
            $this->error('请先登陆','Login/login');
        }
    }

    /**
     * 检查是否
     */
    private function checkAuth()
    {
        $controller = strtolower(request()->controller());
        $action = strtolower(request()->action());
        $url = $controller.'/'.$action;
        $admininfo = json_decode(Session::get('admininfo'),true);
        $adminid = $admininfo['own_groupid'];
        $result = (new Adminuser())->checkAuthById($url,$adminid);
        if(!$result){
            $this->error('您没有权限访问该页面',url('index/main'));
        }
    }
}